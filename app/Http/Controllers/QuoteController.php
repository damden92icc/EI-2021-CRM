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
        $quotes = Quote::all();  
        return view('quote.index', [
            'pageTitle' => 'Listing Quote',
            'pageTabTitle' => 'Listing quotes',
            'quotes'=>        $quotes ,      
        ]);
    }



    public function show($id){

        $quote = Quote::where('id' , $id )->first();

        $selectableServices = Service::all();

        return view('quote.show', [
            'pageTitle' => 'Single quote',
            'pageTabTitle' => 'Listing service',
            'quote'=>  $quote,            
            'servicesSelectable' =>  $selectableServices,
        ]);
    }

    public function create(){

        $selectableCompanies = Company::all();
        $user = Auth::user();

        return view('quote.form', [
            'pageTitle' => 'Create quote',
            'user' => $user,
 
        ]);
    }

    public function myQuote(){

     
        $user = Auth::user();

        $quotes = Quote::where('owner_id', $user->id)->where('quote_state',  '!=', 'ARCHIVED' )->get();  


        return view('quote.index', [
            'pageTitle' => 'Listing Quote',
            'pageTabTitle' => 'Listing quotes',
            'quotes'=>        $quotes ,      
        ]);
    }

    public function store(Request $request){
     
     
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'label' => 'required',        
            'description'=> 'required',
            'concerned_company' => 'required',
                    
        ];


    $request->merge( ['reference' =>  Str::random(20)] + [ 'owner_id' =>  auth()->user()->id] );

    $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
   
    $newQuote =Quote::create($request->all());
 
         return redirect()->intended('/quotes/'.$newQuote->id);
    }

    public function edit(Quote $quote){       
        
     //   dd($quote->concerned_company);
        $selectableCompanies = Company::all();

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
            'label' => 'required',        
            'description'=> 'required',
            'concerned_company' => 'required',
                    
        ];

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
   
        
        $quote->update($request->all());

        return redirect()->intended('/quotes/'.$quote->id);
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


        $quote = $request['quote_id'];

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
   
        $newService = QuoteService::create($request->all());
     
        return redirect()->intended('/quotes/'.$quote);
    }



    public function updateServiceDoc(Request $request){

    $sl = QuoteService::where('id', $request['sl_id'])->first();

        
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'quantity' => 'required',        
            'service_id'=> 'required',
                    
        ];

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
   

        $sl->update($request->all());

        return redirect()->intended('/quotes/'.$sl->quote_id);
    }


    public function sendDocument (Quote $quote){

        $quote->quote_state = "SEND";        
        $quote->save();    
        return redirect()->intended('/quotes/'.$quote->id);
    }
    

    public function archiveDocument (Quote $quote){

        $quote->quote_state = "ARCHIVED";
        $quote->save();    
        return redirect()->intended('/quotes/'.$quote->id);
    }

    public function markasTraited (Quote $quote){

        $quote->quote_state = "TRAITED";
        $quote->save();    
        return redirect()->intended('/quotes/'.$quote->id);
    }


    public function removeServiceDoc($id){

        $service = QuoteService::where('id', $id)->first();

        $quote = $service->quote_id;

        $service->delete();

        return redirect()->route('single-quote', $quote);
       
    }


    public function sendedQuotes(){
        $quotes = Quote::where('quote_state', 'SEND')->get();  
       // return "hellow";
        return view('quote.index', [
            'pageTitle' => 'Listing Quote',
            'pageTabTitle' => 'Listing quotes',
            'quotes'=>        $quotes ,      
        ]);
    }
}




