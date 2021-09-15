<?php

namespace App\Http\Controllers;
use App\Models\Quote;
use App\Models\Documents;
use App\Models\Company;
use App\Models\Service;
use App\Models\QuoteService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    public function index()
    {      
        $quotes = Quote::where('quote_state', 'SENDED')->orWhere('quote_state', 'TRAITED')->get();  
        return view('quote.index', [
            'pageTitle' => 'Listing Quote',
            'pageTabTitle' => 'Listing quotes',
            'quotes'=>        $quotes ,      
        ]);
    }


    public function show($id){

        $myCompany = Company::where('company_type', 'main_company')->first();
        $quote = Quote::where('id' , $id )->first();

        $selectableServices = Service::all();

        return view('quote.show', [
            'pageTitle' => 'Single quote',
            'pageTabTitle' => 'Listing service',
            'quote'=>  $quote,   
            'myCompany' =>   $myCompany,         
            'servicesSelectable' =>  $selectableServices,
        ]);
    }

    public function create(){

        return view('quote.form', [
            'pageTitle' => 'Create quote',
            'user' =>  Auth::user(),
 
        ]);
    }


    public function store(Request $request){
     
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'label' => 'required|string',        
            'description'=> 'required',
            'concerned_company' => 'required|int',                    
        ];


        $request->merge( ['reference' =>  Str::random(10)] + [ 'owner_id' =>  Auth::user()->id] );

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

    


    public function storeServiceDoc (Request $request){

     
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'quantity' => 'required|int',        
            'service_id'=> 'required|int',
            'quote_id' => 'required|int',                    
        ];


        $quote = $request['quote_id'];

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
   
        $newService = QuoteService::create($request->all());
     
        return redirect()->route('single-quote', $quote);
    }



    public function updateServiceDoc(Request $request){

        // Get current Service listing + quote
        $sl = QuoteService::where('id', $request['sl_id'])->first();
        $quote = Quote::where('id', $sl->quote_id )->first();

        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'quantity' => 'required|int',        
            'service_id'=> 'required|int',
                    
        ];

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
   
        $sl->update($request->all());

        return redirect()->route('single-quote', $quote);
    }




    public function myQuote(){     
     
        $myQuotes = Quote::where('owner_id', Auth::user()->id)->get();  

        return view('quote.index', [
            'pageTitle' => 'Listing Quote',
            'pageTabTitle' => 'Listing quotes',
            'quotes'=>        $myQuotes ,      
        ]);
    }



    public function documentChangeState(Quote $quote , String $state){

        $quote->quote_state  = $state;
        $quote->save();    
        return redirect()->route('single-quote', $quote);
    }

    public function documentByState(String $state){


        $user =Auth::user();

        // check if user is client
        if($user->checkRole(1) ){

            $listingQuotes  = Quote::where('owner_id', Auth::user()->id)->where( 'quote_state',   $state)->get();  
        }
        else{
            $listingQuotes = Quote::where( 'quote_state',   $state)->get();  
        }


        return view('quote.index', [
            'pageTitle' => 'Listing Quote ',
            'pageTabTitle' => 'Listing quotes',
            'quotes'=>          $listingQuotes  ,      
        ]);
    }
   
    public function getDocumentByState(Request $request){

        $state = $request->state;

        $user =Auth::user();

        // check if user is client
        if($user->checkRole(1) ){

            $listingQuotes  = Quote::where('owner_id', Auth::user()->id)->where( 'quote_state',   $state)->get();  
        }
        else{
            $listingQuotes = Quote::where( 'quote_state',   $state)->get();  
        }


        return view('quote.index', [
            'pageTitle' => 'Listing Quote ',
            'pageTabTitle' => 'Listing quotes',
            'quotes'=>          $listingQuotes  ,      
        ]);

    }

    public function removeServiceDoc($id){

        $service = QuoteService::where('id', $id)->first();

        $quote = $service->quote_id;

        $service->delete();

        return redirect()->route('single-quote', $quote);
       
    }


}




