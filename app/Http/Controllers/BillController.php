<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\IssueBill;
use App\Models\Employe;
use App\Models\User;
use App\Models\Company;
use App\Models\Project;
use App\Models\ProjectService;
use App\Models\BillService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendBill;

use App\Notifications\changeStateBill;
use Illuminate\Support\Facades\Notification;


class BillController extends Controller
{
    public function index()
    {      
        // Return bill based on the role (Client or Manager)
        $user= Auth::user();

        if($user->role->id == 1){


            // Tab to store all id from company where user work
          $tabCompanyID = [];

            foreach($user->employes as $job){
            
                // get all bills assigned with teh company
                $bills = Bill::select('id')->where('concerned_company',  $job->company_id )->where('bill_state', '!=', 'DRAFT')->get();                
                
                foreach($bills as $data){
                    array_push($tabCompanyID,  $data->id );
                }
            }

            // get all bills by passing matched bill id array
            $bills= Bill::whereIn('id', $tabCompanyID)->get();

       
        }

        elseif($user->role->id == 2){
            $bills = Bill::where('owner_id', $user->id)->get(); 
        }
        else{
            $bills = Bill::whereIn('bill_state', ['PAYED', 'VALIDED'])->get(); 
        }



 
        return view('bill.index', [
            'pageTitle' => 'Listing bills',
            'pageTabTitle' => 'Listing bills',
            'bills'=>        $bills ,
      
        ]);
    }






    public function show($id)
    {      

        $myCompany = Company::where('company_type', 'main_company')->first();
        $bill = Bill::where('id', $id)->first();

        $services = BillService::where('bill_id', $bill->id)->get();

        $totalHT = 0;
        foreach($services as $data ){
          $totalHT +=  $data->service->quantity * $data->service->unit_sell_ht;
        }

      
        return view('bill.show', [
            'pageTitle' => 'Single bill',
            'pageTabTitle' => 'Listing services ',         
            'bill'=>        $bill ,  
            'myCompany' => $myCompany,
            'totalSellHT'     => $totalHT
        ]);
    }

    public function create(){

        $selectableCompanies = Company::where('company_type', 'client')->where('active', true)->get();
        return view('bill.form', [
            'pageTitle' => 'Create bill',
           'companies' => $selectableCompanies ,
        ]);
    }


    public function store(Request $request){

        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'label' => 'required',        
            'description'=> 'required',       
            'validity_delay' => 'required',         
            'concerned_company' => 'required',
                    
        ];


        $company = $request->concerned_company;
        $date = Carbon::now();
        $cptRef = Bill::where('concerned_company', $company)->count();
        $reference = "B" . $company. "-" .  strtoupper( $date->shortEnglishMonth) . "-". $date->year . "-00" . $cptRef+1;


        $request->merge( ['due_date'=>  Carbon::now()->addDays($request->validity_delay) ] + ['reference' =>    $reference ] + [ 'owner_id' =>  auth()->user()->id] );

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
       
       // dd($request);
        $newBill =Bill::create($request->all());

        return redirect()->intended('/bills/single/'.$newBill->id);
    }


    public function edit(Bill $bill){

        $currentCompany= Company::where('id', $bill->concerned_company)->first();
        $selectableCompanies =Company::where('company_type', 'client')->where('active', true)->get();

        return view('bill.form', [
            'pageTitle' => 'Update bill',
            'bill' => $bill,
            'currentCompany' => $currentCompany ,
           'companies' => $selectableCompanies ,
        ]);
    }


    public function update(Request $request, Bill $bill){

        $bill= Bill::where('id', $bill->id)->first();

        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'label' => 'required',        
            'description'=> 'required',       
            'validity_delay' => 'required',
            'due_date' => 'required',
            'concerned_company' => 'required',
                    
        ];

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
       
        $bill->update($request->all());

        return redirect()->intended('/bills/'.$bill->id);
    }

    /**
     * Service managements
     */


    public function storeServiceDoc(Request $request){

        $services = $request->get('serviceListing');

        $billID = $request->get('bill_id');
        $bill = Bill::where('id', $billID)->first();

        foreach($services as $data){
            
            $ps = ProjectService::where('id', $data)->first();

            $totalSP = $ps->unit_sell_ht * $ps->quantity;
     

            $newBillService = BillService::create([
                'total_sp_ht' => $totalSP,
                'vat_rate' => 21,
                'ps_id' => $ps->id,
                'bill_id' => $billID
            ]);

            $bill->total_sell_ht += $newBillService->total_sp_ht;
            $bill->save();
        }


        

       
        return redirect()->intended('/bills/single/'.$billID);

    }



    public function removeServiceDoc($id){

        $service = BillService::where('id', $id)->first();

        $bill = Bill::where('id',  $service->bill_id)->first();

        $bill->total_sell_ht =  $bill->total_sell_ht - ($service->total_sp_ht) ;
        $bill->save();

        $service->delete();

        return redirect()->route('single-bill', $bill);
       
    }



    public function serviceBillable(Request $request){

        $billID =json_decode( $request->input('search'));

        $bill = Bill::where('id', $billID)->first();

        $projects = Project::where('concerned_company' , $bill->concerned_company)->get();


        $billableServices = [];

        foreach($projects as $data){

            $ps = ProjectService::where('project_id', $data->id)->where('is_billable', true)->where('service_state', 'RUNNING')->get();

            foreach($ps as $service){

            $service['bill_id'] =    $bill->id;
            $service['project_name'] = $data->label;
            $service['ps_id'] = $service->id;
            $service['service_name'] = $service->service->label;

                array_push($billableServices,$service) ;

            }            
        
        }

        return $billableServices;
    }



/**
 * Change state
 */

    public function sendDocument (Bill $bill){

        // REtrive ps id from project service and edit state
       foreach ($bill->billServices as $data){
            $ps = ProjectService::where('id',  $data->ps_id)->first();
            $ps->payement_state = "PAYEMENT AWAITING" ;
            $ps->is_billable = 0 ;
            $ps->save();
        }

        // Send notification to all employ 
        $employes = Employe::where('company_id', $bill->concerned_company)->get();

        foreach($employes as $data){

            $notifTarget = User::where('id', $data->user_id)->first();
            Notification::send($notifTarget, new SendBill($bill));
        }
   

       // edit bill state 
        $bill->bill_state = "SENDED";
        $bill->sended_date =Carbon::now() ;
        $bill->save();    
        return redirect()->intended('/bills/single/'.$bill->id);
    }




    public function valideDocument (Bill $bill){

        // REtrive ps id from project service and edit state
        foreach ($bill->billServices as $data){
            $ps = ProjectService::where('id',  $data->ps_id)->first();
            $ps->last_payement_date =Carbon::now() ;
            $ps->payement_state = "PAYED" ;
            $ps->save();
        }

       // edit bill state 
        $bill->bill_state = "VALIDED";
        $bill->sended_date =Carbon::now() ;
        $bill->save();    
        return redirect()->intended('/bills/single/'.$bill->id);

    }

    public function archiveDocument (Bill $bill){
        $bill->bill_state = "ARCHIVED";     
        $bill->save();    
        return redirect()->intended('/bills/single/'.$bill->id);
    }


    public function payBill (Bill $bill){
        
        // REtrive ps id from project service and edit state
        
        foreach ($bill->billServices as $data){
            $ps = ProjectService::where('id',  $data->ps_id)->first();
            $ps->last_payement_date =Carbon::now() ;
            $ps->payement_state = "PAYED" ;
            $ps->save();
        }
        

        $notifTarget = User::where('role_id', 2)->get();
        Notification::send($notifTarget, new changeStateBill($bill, "PAYED"));

        $bill->bill_state = "PAYED";         
        $bill->save();    
        return redirect()->intended('/bills/single/'.$bill->id);
    }


    public function reportIssue(Request $request, Bill $bill){
        // construct new query 
        $request->merge( [ 'bill_id' => $bill->id ]);        
        $request->merge( ['send_date' => Carbon::now()] );

        // Edit vill state
        $bill->bill_state = "ISSUED";
        $bill->save();


        // Create notif
        $notifTarget = User::where('role_id', 2)->get();
        Notification::send($notifTarget, new changeStateBill($bill, $bill->bill_state));
        // create comment
        $newIssue = IssueBill::create($request->all());

        return redirect()->intended('/bills/single/'.$bill->id);

    }
    
}
