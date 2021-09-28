<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Offer;
use App\Models\Company;
use App\Models\Service;
use App\Models\Employe;
use App\Models\User;
use App\Models\ProjectService;
use App\Models\ServiceProvDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RequestRemovePS;
use App\Notifications\AnswerRemovePS;
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
        $queryAS = ProjectService::where('project_id', $id)->where('service_state', "RUNNING")->get();
        // get active reccurent service
        $queryARS = ProjectService::where('project_id', $id)->where('recurrency_payement', '!=', null)->where('service_state', 'RUNNING')->get();
       
        // somme all price * qt foreach active recc service
        $totalPriceASR=0.0;

        foreach($queryARS  as $data){

             $totalPriceASR  += $data->unit_sell_ht * $data->quantity;

             // Check and calcul date for recurrent service 
             // change state if become billable
             if($data->last_payement_date == null ){
        
                $npd =   $this->calculNextPayDate(Carbon::parse($data->start_date),  $data->recurrency_payement );

                $data->next_payement_date = $npd ;
                $data->save();
                $data->is_billable = $this->calculServiceIsBillable($npd);
                $data->save();
             }

             else{

              //  dd($data->next_payement_date);
        
                $data->next_payement_date =    $this->calculNextPayDate(Carbon::parse($data->last_payement_date),  $data->recurrency_payement ) ;
                $data->save();
            //    dd($data->next_payement_date);

                $data->is_billable = $this->calculServiceIsBillable(           $data->next_payement_date );
                $data->save();
             }
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
    

    public function archive (Project $project){
        $project->project_state = "ARCHIVED";
        
        $project->save();    
        return redirect()->intended('/projects/single/'.$project->id);
    }




    public function removeServiceDoc($id){

        $service = ProjectService::where('id', $id)->first();           
        $project = Project::where('id', $service->project_id)->first();
        $employes = Employe::where('company_id', $project->concerned_company)->get();


        $service->service_state = "ARCHIVED";
        $service->save();    

        foreach($employes as $data){

            $notifTarget = User::where('id', $data->user_id)->first();
            Notification::send($notifTarget, new AnswerRemovePS($project,   $service->service_state));
        }

       
       

      

        return redirect()->route('single-project', $service->project_id);
       
    }


    /**
     * Additionnal function 
     */


    public function askCancelServiceDoc ($id){
        $service = ProjectService::where('id', $id)->first();
        $service->service_state = "CANCELLATION ASKED";

        $notifTarget =  User::where('role_id', 2)->get(); 
        $project = Project::where('id', $service->project_id)->first();
        Notification::send($notifTarget, new RequestRemovePS($project));

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

    public function turnIntoProject(Request $request, Offer $offer){
        
         // Retrive main data
         $request->merge( ['label' => 'Project -  '.  $offer->label ]
         +   ['description' => $offer->description] 
         +   ['is_active' => true] 
         +   ['project_state' =>"DRAFT"] 
         +   ['start_date' => Carbon::now()] 
         +   ['concerned_company' => $offer->company->id] 
         +   ['reference' =>  Str::random(20)] 
         + [ 'owner_id' =>  auth()->user()->id] 
     );


     // create new project 
     $newProject =Project::create($request->all());

        // Add service 
        foreach($offer->services as $data){       
            $newService =ProjectService::create(['project_id'=> $newProject->id ,
                                        'quantity'=> $data->quantity,
                                        'is_active' => false,
                                        'service_state' => 'DRAFT',
                                        'start_date' =>Carbon::now(),
                                        'next_payement_date'=> Carbon::now()->addYears(),
                                        'unit_cost_ht'=> $data->unit_cost_ht,
                                        'unit_sell_ht' => $data->unit_sell_ht,
                                        'service_id' =>$data->service_id ]);
                                    }


        return redirect()->intended('/projects/single/'.$newProject->id);
    }
        
}
