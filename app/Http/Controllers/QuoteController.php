<?php

namespace App\Http\Controllers;
use App\Models\Quote;
use App\Models\Company;
use App\Models\Service;
use App\Models\QuoteService;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendQuote;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\DataTables;
use Validator;

class QuoteController extends Controller
{
    public function index() {      
        
   
        return view('quote.index', [
            'user' => Auth::user(),
            'pageTitle' => 'Listing Quotes',
            'pageTabTitle' => 'Listing of quotes',
    
        ]);
    }


    public function show($id){

        $myCompany = Company::where('company_type', 'main_company')->first();
        $quote = Quote::where('id' , $id )->first();

        $selectableService = Service::where('active', 1)->get();
        return view('quote.show', [
            'pageTitle' => 'Single quote',
            'pageTabTitle' => 'Listing service',
            'quote'=>  $quote,   
            'myCompany' =>   $myCompany,         
            'services' =>   $selectableService,        
        ]);
    }

    public function create(){

        return view('quote.form', [
            'pageTitle' => 'Create quote',
            'user' =>  Auth::user(),
 
        ]);
    }


    public function store(Request $request){
     
        $user= Auth::user()->id;
        
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'label' => 'required|string',        
            'description'=> 'required',
            'concerned_company' => 'required|int',                    
        ];

        

        $date = Carbon::now();
        $cptQuote = Quote::where('owner_id', $user)->count();
        
        $reference = "Q" + $user. "-" +  strtoupper( $date->shortEnglishMonth) + "-" + $date->year + "-00" + $cptQuote+1;

        $request->merge( ['reference' =>  $reference] + [ 'owner_id' => $user]);

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
   
        $newQuote = Quote::create($request->all());
 
        return redirect()->route('single-quote', $newQuote);
    }

    public function edit(Quote $quote){       
        
        $selectableCompanies = Company::where(['active', true, 'company_type', 'client']);


        return view('quote.form', [
            'pageTitle' => 'Update quote',
            'user' =>  Auth::user(),
            'quote' => $quote,
            'companies' => $selectableCompanies ,
        ]);
    }

    public function update(Request $request, Quote $quote){
         
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'label' => 'required|string',        
            'description'=> 'required',
            'concerned_company' => 'required|int',
                    
        ];

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
   
        
        $quote->update($request->all());
        return redirect()->route('single-quote', $quote);
    }
    

    public function documentChangeState(Quote $quote , String $state){

        $notifTarget =  User::where('role_id', 2)->get(); 

       // dd($notifTarget);
        $quote->quote_state  = $state;


        if($quote->quote_state == "SENT"){
            $quote->sended_date =  Carbon::now();
           // $->notify();
            Notification::send($notifTarget, new SendQuote($quote));
        }
        
        $quote->save();  
         
        return redirect()->route('single-quote', $quote);
    }



    public function storeServiceDoc (Request $request){


        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'quantity' => 'required',        
            'service_id'=> 'required',
            'quote_id' => 'required',                    
        ];


        $validator = Validator::make($request->all(), [
            'quantity' => 'required',        
            'service_id'=> 'required',
            'quote_id' => 'required',     
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        else{
            $newService = QuoteService::create($request->all());
        }
       
    }

    public function updateServiceDoc(Request $request){

        // Get current Service listing + quote
        $sl = QuoteService::where('id', $request->get('sl_id'))->first();

        $validator = Validator::make($request->all(), [
            'quantity' => 'required',        
            'service_id'=> 'required',      
        ]);
  
       
        if($validator->fails() ){
            return response()->json($validator->errors(), 422);
        }

        else{
            $sl->update($request->all());
        }
       

    }

    public function removeServiceDoc($id){

        $service = QuoteService::where('id', $id)->first();

        $quote = $service->quote_id;

        $service->delete();

        return redirect()->route('single-quote', $quote);
       
    }


    public function indexJson(Request $request){
   
        $result = [];

        // Check role client to get listing of all quote
        if(Auth::user()->checkRole(1) ){

         $listingQuotes  = Quote::where('owner_id', Auth::user()->id)->get();  
            
         $cpt = 1;  
          foreach($listingQuotes as $data){
            
            // Adding needed value to tab
              array_push($result,
                [ 
                    'row_id' => $cpt,
                    'quote_id' => $data->id, 
                    'label' => $data->label ,
                    'description' =>  $data->description , 
                    'reference' =>$data->reference ,
                    'state' => $data->quote_state ,
                    'company' => $data->company->name 
                ]) ;
                $cpt= $cpt+1;
          }
            
          
        }

        // User is manager
        else {

            $listingQuotes = Quote::whereIn( 'quote_state',   ["SENT", "TRAITED", "ARCHIVED"])->get();
            $cpt = 1;    

            foreach($listingQuotes as $data){
            
                array_push($result,
                [
                    'row_id' => $cpt,
                    'quote_id' => $data->id, 
                    'label' => $data->label ,
                    'description' => $data->description , 
                    'reference' =>$data->reference ,
                    'state' => $data->quote_state ,
                    'company' => $data->company->name 
                  ]) ;
                  $cpt= $cpt+1;
            }
        }
                
        // return json tab with datatable method
        return datatables($result)->setRowId('row_id')->toJson();
    }

    public function indexJsonByState(Request $request, String $state){

        $result = [];

        // Check role client to get listing of all quote
        if(Auth::user()->checkRole(1) ){

         $listingQuotes  = Quote::where('owner_id', Auth::user()->id)->where('quote_state', $state)->get();  
            
         $cpt = 1;  
          foreach($listingQuotes as $data){
            
            // Adding needed value to tab
              array_push($result,
                [ 
                    'row_id' =>    $cpt ,
                    'quote_id' => $data->id, 
                    'label' => $data->label ,
                    'description' =>  $data->description , 
                    'reference' =>$data->reference ,
                    'state' => $data->quote_state ,
                    'company' => $data->company->name 
                ]) ;
                $cpt= $cpt+1;
          }
            
          
        }

        // User is manager
        else {

            $listingQuotes = Quote::where('quote_state', $request->$state)->get();
            $cpt = 1;    

            foreach($listingQuotes as $data){
            
                array_push($result,
                [
                    'row_id' => $cpt,
                    'quote_id' => $data->id, 
                    'label' => $data->label ,
                    'description' => $data->description , 
                    'reference' =>$data->reference ,
                    'state' => $data->quote_state ,
                    'company' => $data->company->name 
                  ]) ;
                  $cpt= $cpt+1;
            }
        }
                
        // return json tab with datatable method
        return datatables($result)->setRowId('row_id')->toJson();
    }


}




