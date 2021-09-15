<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Company;
use App\Models\Service;
use App\Models\Employe;
use App\Models\ProjectService;
use App\Models\ServiceProvDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    public function index(){

        $projects = Project::all();  

        return view('project.index', [
            'pageTitle' => 'Listing projects',
            'pageTabTitle' => 'Listing projects',
            'projects'=>        $projects ,      
        ]);
    }

    public function show($id){
        
        $currentProject = Project::where('id', $id)->first();  

        // Get active service
        $queryAS = ProjectService::where('project_id', $id)->where('is_active', true)->get();
        // get active reccurent service
        $queryARS = ProjectService::where('project_id', $id)->where('recurrency_payement', '!=', null)->where('is_active', true)->get();
       
        // somme all price * qt foreach active recc service
        $totalPriceASR=0.0;

        foreach($queryARS  as $data){
             $totalPriceASR  += $data->unit_sell_ht * $data->quantity;
        }     
 
        // Get all service available and providers
        $selectableServices = Service::all();
        $selectableProviders = Company::where('company_type', "provider")->get();  
     
        return view('project.show', [
            'pageTitle' => 'Project details',
            'pageTabTitle' => 'Listing service',
            'project'=>         $currentProject ,      
            'servicesSelectable' =>  $selectableServices,
            'selectableProviders' => $selectableProviders,
            'countAS' => count(   $queryAS ), 
            'countRS' => count($queryARS), 
            'sumReccService' =>  $totalPriceASR,        
        ]);
    }

    public function create(){
        $selectableCompanies = Company::where('company_type', 'client')->where('active', true)->get();

        return view('project.form', [
            'pageTitle' => 'Create projects',
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
            'project_state' => 'required',
            'start_date' => 'required',         
            'concerned_company' => 'required',
                    
        ];
        

        $request->merge( ['reference' =>  Str::random(20)] + [ 'owner_id' =>  auth()->user()->id] );
        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     

        $newProject =Project::create($request->all());
        return redirect()->intended('/projects/single/'.$newProject->id);
    }

    public function edit($id){
        $project = Project::where('id', $id)->first();
        $selectableCompanies = Company::all();

        return view('project.form', [
            'pageTitle' => 'Create projects',
            'companies' => $selectableCompanies ,
            'project' => $project,
        ]);
    }


    public function update(Request $request, Project $project){

        $project = Project::where('id',$project->id)->first();

        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'label' => 'required',        
            'description'=> 'required',
            'project_state' => 'required',
            'start_date' => 'required',         
            'concerned_company' => 'required',
                    
        ];

     
        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     

        $project->update($request->all());

        return redirect()->intended('/projects/single/'.$project->id);

        dd("oh hellow tities");
    }

    /**
    * Service management
    */



    public function storeServiceDoc(Request $request){

   
   //     dd($request);
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'quantity' => 'required',        
            'unit_cost_ht' => 'required',   
            'unit_sell_ht' => 'required',   
            'service_id'=> 'required',
            'project_id' => 'required',
                    
        ];

    
        $startDate = $request->get("start_date"); 
        $reccurency = $request->get("recurrency_payement");
     

        $npd =   $this->calculNextPayDate(Carbon::parse($startDate), $reccurency );

        $request->merge([
            'next_payement_date' => $npd,          
            'is_billable' => $this->calculServiceIsBillable($npd),
        ]);



    $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
    
    $spd = $request->get("spd_unit_cost_ht");

        if(  $spd != null ){

            $newService =ProjectService::create($request->all());

            $request->merge([
                'ps_id' =>    $newService->id,          
                
            ]);
         //   dd($request);
            $newProvService =ServiceProvDetails::create($request->all()); ; 
           
            }
            else{
              
                $newService =ProjectService::create($request->all());
            }


        return redirect()->intended('/projects/single/'.$request->project_id);
    }



    public function updateServiceDoc(Request $request){    
        
       // dd($request);
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'quantity' => 'required',        
            'service_id'=> 'required',
            'sl_id' => 'required',
            'recurrency_payement' => 'required',
                    
        ];    

        $startDate = $request->get("start_date"); 
        $reccurency = $request->get("recurrency_payement");
     

        $npd =   $this->calculNextPayDate(Carbon::parse($startDate), $reccurency );

        $request->merge([
            'next_payement_date' => $npd,          
            'is_billable' => $this->calculServiceIsBillable($npd),
        ]);


        $validator = \Validator::make($request->all(), $rules, $messages)->validate();    
           
        $sl =ProjectService::where('id', $request['sl_id'])->first();
        $sl->update($request->all());


        if($sl->serviceProv){
            $slp = ServiceProvDetails::where('id', $request['slp_id'])->first();
            $slp->update($request->all());
        }

        
        return redirect()->route('single-project', $sl->project_id);
       
    }
    


    public function removeServiceDoc($id){

        $service = ProjectService::where('id', $id)->first();
        $service->service_state = "Archived";
        
        $service->save();    

        return redirect()->route('single-project', $service->project_id);
       
    }


    /**
     * Additionnal function 
     */

    public function archive (Project $project){
        $project->project_state = "Archived";
        
        $project->save();    
        return redirect()->intended('/projects/single/'.$project->id);
    }

    public function askCancelServiceDoc ($id){
        $service = ProjectService::where('id', $id)->first();
        $service->service_state = "Cancellation Asked";
        
        $service->save();    
        return redirect()->intended('/projects/single/'.$service->project_id);
    }




    public function calculNextPayDate($startDate, $reccurency){

        $nextPayementDate = null ; 

        switch ($reccurency) {
            case "YEARLY":
            $nextPayementDate = $startDate->addYear() ;
            break;
            case "HALF-YEARLY":
            $nextPayementDate = $startDate->addMonths(6) ;
            break;
            case "TRIMESTRIAL":
            $nextPayementDate = $startDate->addMonths(3) ;
            break;
            case "MONTHLY":
            $nextPayementDate = $startDate->addMonths() ;
            break;
        }
        return $nextPayementDate; 

    }


    public function calculServiceIsBillable( $date){
             
        if ( $date->subDays(29)  <= Carbon::now()  ){
          return 1;
          
        }
        return 0;
    }

    public function myProject(){

        $user = Auth::user();

        $employements=  Employe::where('user_id', $user->id)->get();


        foreach($employements as $employ){
            $projects = Project::where('concerned_company', $employ->company_id)->get();  
        }


        return view('project.index', [
            'pageTitle' => 'Listing projects',
            'pageTabTitle' => 'Listing projects',
            'projects'=>        $projects ,      
        ]);
    }

    public function checkState($stateBill){

        if($stateBill = 1){
            return "TO PAY";
        }
    }
        
}
