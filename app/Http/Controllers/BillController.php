<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\Company;
use App\Models\Project;
use App\Models\ProjectService;
use App\Models\BillService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BillController extends Controller
{
    public function index()
    {      

        $bills = Bill::all();  
        return view('bill.index', [
            'pageTitle' => 'Listing bills',
            'pageTabTitle' => 'Listing bills',
            'bills'=>        $bills ,
      
        ]);
    }


    public function show($id)
    {      

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
            'totalSellHT'     => $totalHT
        ]);
    }

    public function create(){

        $selectableCompanies = Company::all();
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
            'due_date' => 'required',
            'concerned_company' => 'required',
                    
        ];

        $request->merge( ['reference' =>  Str::random(20)] + [ 'owner_id' =>  auth()->user()->id] );

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
       
       // dd($request);
        $newBill =Bill::create($request->all());

        return redirect()->intended('/bills/'.$newBill->id);
    }


    public function edit(Bill $bill){

        $currentCompany= Company::where('id', $bill->concerned_company)->first();
        $selectableCompanies = Company::all();

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
        
        foreach($services as $data){
            
            $ps = ProjectService::where('id', $data)->first();

          //  dd($ps);
            $totalSP = $ps->unit_sell_ht * $ps->quantity;
     

            $newBillService = BillService::create([
                'total_sp_ht' => $totalSP,
                'vat_rate' => 21,
                'ps_id' => $ps->id,
                'bill_id' => $billID
            ]);
        }

        return redirect()->intended('/bills/'.$billID);

    }



    public function removeServiceDoc($id){

        $service = BillService::where('id', $id)->first();

        $bill = $service->bill_id;

        $service->delete();

        return redirect()->route('single-bill', $bill);
       
    }



    public function serviceBillable(Request $request){

        $billID =json_decode( $request->input('search'));


        $bill = Bill::where('id', $billID)->first();


        $projects = Project::where('id' , $bill->concerned_company)->get();

        $billableServices = [];

        foreach($projects as $data){

            $ps = ProjectService::where('project_id', $data->id)->where('is_billable', true)->get();

            foreach($ps as $service){

                $service['bill_id'] =    $bill->id;
               $service['project_name'] = $data->label;
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
        $bill->bill_state = "SENDED";
        $bill->sended_date =Carbon::now() ;
        $bill->save();    
        return redirect()->intended('/bills/'.$bill->id);
    }

    public function valideDocument (Bill $bill){
        $bill->bill_state = "Valided";
    
        $bill->save();    
        return redirect()->intended('/bills/'.$bill->id);
    }

    public function archiveDocument (Bill $bill){
        $bill->bill_state = "ARCHIVED";     
        $bill->save();    
        return redirect()->intended('/bills/'.$bill->id);
    }

    
}
