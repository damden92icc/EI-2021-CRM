<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Company;
use App\Models\Service;
use App\Models\OfferService;
use App\Models\OfferComment;
use App\Models\Quote;
use App\Models\User;
use App\Notifications\SendOffer;
use App\Notifications\AcceptanceOffer;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function index(){      

        // Return Offer based on the role (Client or Manager)
        $user= Auth::user();

        if($user->role->id == 2){

            $offers = Offer::where('owner_id',$user->id)->get();  
        }

        elseif($user->role->id == 1){

            $offerState = ['ARCHIVED', 'SENDED', 'ACCEPTED'];
            $offers = Offer::where([['concerned_client', $user->id ]])->whereIn('offer_state', $offerState)->get();
        }
        else{
            $offers = Offer::all(); 
        }
      
        return view('offer.index', [
            'pageTitle' => 'Listing Offers',
            'pageTabTitle' => 'Listing Offers',
            'offers'=>        $offers ,
      
        ]);
    }

    public function show($id){      
        $offer = Offer::where('id', $id)->first();  

        $total = count( OfferService::where('offer_id', $id)->get());

        $selectableServices = Service::all();
        $myCompany = Company::where('company_type', 'main_company')->first();
        return view('offer.show', [
            'pageTitle' => 'Single Offers',
            'pageTabTitle' => 'Listing services ',
            'servicesSelectable' =>  $selectableServices,
            'myCompany' => $myCompany ,
            'offer'=>        $offer ,
      
        ]);
    }

    public function create(){

        $selectableCompanies = Company::where([['active', true], ['company_type', 'client'] ])->get();
        return view('offer.form', [
            'pageTitle' => 'Create offer',
           'companies' => $selectableCompanies ,
        ]);
    }

    public function store(Request $request){
     
 
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $validityDelay = ( Carbon::today()->diffInDays(Carbon::parse($request->due_date)))  ;

        $rules = [
            'label' => 'required|string',        
            'description'=> 'required',
            'offer_priority_state' => 'required|string',        
            'due_date' => 'required',
            'concerned_company' => 'required|int',
            'concerned_client' => 'required|int'                    
        ];


        $user = $request->concerned_client ; 
        $date = Carbon::now();
        $cptRef = Offer::where('concerned_client', $user)->count();
        
        $reference = "O" . $user. "-" .  strtoupper( $date->shortEnglishMonth) . "-". $date->year . "-00" . $cptRef;


        $request->merge( ['reference' =>     $reference] + ['validity_delay' => $validityDelay] + [ 'owner_id' =>  auth()->user()->id] );

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
    
        $newOffer =Offer::create($request->all());
        return redirect()->intended('/offers/single/'.$newOffer->id);
    }

    public function edit(Offer $offer){

        $currentCompany= Company::where('id', $offer->concerned_company)->first();
        $selectableCompanies = Company::all();

        return view('offer.form', [
            'pageTitle' => 'Update offer',
            'offer' => $offer,
            'currentCompany' => $currentCompany ,
           'companies' => $selectableCompanies ,
        ]);
    }

    public function update (Request $request, Offer $offer){

        $offer= Offer::where('id', $offer->id)->first();

        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'label' => 'required|string',        
            'description'=> 'required',
            'offer_priority_state' => 'required|string',        
            'due_date' => 'required',
            'concerned_company' => 'required|int',
            'concerned_client' => 'required|int'           
        ];

        $validityDelay = ( Carbon::today()->diffInDays(Carbon::parse($request->due_date)))  ;

        $request->merge( [ ['validity_delay' => $validityDelay] ]);

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     

        $offer->update($request->all());

        return redirect()->intended('/offers/single/'.$offer->id);
    }


    public function storeServiceDoc(Request $request){

        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'quantity' => 'required|int',        
            'service_id'=> 'required|int',
            'offer_id' => 'required|int',
            'unit_sell_ht' => 'required|int',
            'unit_cost_ht' => 'required|int',
                    
        ];

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     

        $newService =OfferService::create($request->all());

        $offer = Offer::where('id', $request['offer_id'])->first();
        $offer->total_sell_ht = $offer->total_sell_ht + ($request->quantity * $request->unit_sell_ht);
        $offer->total_cost_ht = $offer->total_cost_ht + ($request->quantity * $request->unit_cost_ht);
        $offer->save();

        return redirect()->intended('/offers/single/'.$request->offer_id);
    }

    public function removeServiceDoc($id){
        $service = OfferService::where('id', $id)->first();
        $offer = $service->offer_id;
        $service->delete();
        return redirect()->route('single-offer', $offer);
       
    }


    public function updateServiceDoc(Request $request){

        $sl = OfferService::where('id', $request['sl_id'])->first();
    
            $messages = [
                'required' => 'Ce champs ne peut etre vide',
            ];
    
            $rules = [
                'quantity' => 'required|int',     
                'unit_cost_ht' => 'required',     
                'unit_sell_ht' => 'required',        
                'service_id'=> 'required|int',
                        
            ];
    
            $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
           
            $sl->update($request->all());
    
            
            $offer = Offer::where('id', $sl->offer_id)->first();
            $offer->total_sell_ht = $offer->total_sell_ht + ($request->quantity * $request->unit_sell_ht);
            $offer->total_cost_ht = $offer->total_cost_ht + ($request->quantity * $request->unit_cost_ht);
            $offer->save();


            return redirect()->intended('/offers/single/'.$sl->offer_id);
        }




    public function documentByState(String $state){

        $user = Auth::user();

        // Check if user is client or maanger to get own offer
        if($user->role->id == 1){
            $myOffer = Offer::where('concerned_client', $user->id )->where('offer_state', $state)->get();
        }

        else{
            $myOffer = Offer::where('owner_id', $user->id )->where('offer_state', $state)->get();
        }
        
    
        return view('offer.index', [
            'pageTitle' => 'Listing Offers',
            'pageTabTitle' => 'Listing Offers',
            'offers'=> $myOffer ,      
        ]);
    }

    
    public function documentChangeState(Offer $offer , String $state){
        $offer->offer_state = $state    ;

        if(  $offer->offer_state== "SENT"){

            $notifTarget =  User::where('id', $offer->concerned_client)->first(); 
            Notification::send($notifTarget, new SendOffer($offer));
        }

        if($offer->offer_state == "ACCEPTED" ||   $offer->offer_state=="DECLINED" ){

            $notifTarget =  User::where('id', $offer->owner_id)->first(); 
            Notification::send($notifTarget, new AcceptanceOffer($offer));
        }

        if($offer->offer_state == "VALIDED"  ){
            // notif Client + Offer owner
            $notifTarget =  User::where('id', $offer->concerned_client)->first(); 
            Notification::send($notifTarget, new AcceptanceOffer($offer));
            $notifTarget =  User::where('id', $offer->owner_id)->first(); 
            Notification::send($notifTarget, new AcceptanceOffer($offer));
        }
        $offer->offer_state = $state;
        $offer->save();    
        return redirect()->intended('/offers/single/'.$offer->id);
    }


    public function commentOffer(Request $request, Offer $offer){

        // construct new query 
        $request->merge( [ 'offer_id' => $offer->id ]);        
        $request->merge( ['send_date' => Carbon::now()] );
       
        $offer->offer_state = "UPDATE ASKED";
        // notif +  change state

        $notifTarget =  User::where('id', $offer->owner_id)->first(); 
        Notification::send($notifTarget, new AcceptanceOffer($offer));

        
        $offer->save();            
       
        // create comment
        $newComment = OfferComment::create($request->all());

        return redirect()->intended('/offers/single/'.$offer->id);

    }


    public function turnIntoOffer(Request $request, Quote $quote){

        $quote->quote_state = "TRAITED";
         // Retrive main data
        $request->merge( ['label' => 'Offer from -  '.  $quote->label ]
                    +   ['description' => $quote->description] 
                    +   ['offer_priority_state' =>"LOW"] 
                    +   ['due_date' => Carbon::now()->addMonths()] 
                    +   ['concerned_company' => $quote->company->id] 
                    +   ['concerned_client' => $quote->users->id] 
                    +   ['reference' =>  Str::random(20)] 
                    + [ 'owner_id' =>  auth()->user()->id] 
                );

        // Create new offer
        $newOffer =Offer::create($request->all());

        // Add service 
        foreach($quote->services as $data){       
            $newService =OfferService::create(['offer_id'=> $newOffer->id ,'quantity'=> $data->quantity, 'unit_cost_ht'=> 0, 'unit_sell_ht' => 0, 'service_id' =>$data->service_id ]);
        }

        return redirect()->intended('/offers/single/'.$newOffer->id);
    }


    public function indexJson(){

        $result = [];

        // Check role client to get listing of all offer
        if(Auth::user()->checkRole(1) ){

         $listing  = Offer::where('concerned_client', Auth::user()->id)->whereIn( 'offer_state',   ["SENT", "TRAITED", "ARCHIVED", "ACCEPTED"])->get();  
            
         $cpt = 1;  
          foreach($listing as $data){
            
            // Adding needed value to tab
              array_push($result,
                [ 
                    'row_id' => $cpt,
                    'offer_id' => $data->id, 
                    'label' => $data->label ,
                    'description' =>  $data->description , 
                    'reference' =>$data->reference ,
                    'state' => $data->offer_state ,
                    'due_date' => $data->due_date ,
                    'company' => $data->company->name 
                ]) ;
                $cpt= $cpt+1;
            }
        }

        else {  // User is manager

            $listing = Offer::all();
            $cpt = 1;    

            foreach($listing as $data){
            
                array_push($result,
                [ 
                    'row_id' => $cpt,
                    'offer_id' => $data->id, 
                    'label' => $data->label ,
                    'description' =>  $data->description , 
                    'reference' =>$data->reference ,
                    'state' => $data->offer_state ,
                    'due_date' => $data->due_date ,
                    'company' => $data->company->name 
                ]) ;
                  $cpt= $cpt+1;
            }
        }
                
        // return json tab with datatable method
        return datatables($result)->setRowId('row_id')->toJson();
    }


    public function indexJsonByState(String $state){

        $result = [];

        // Check role client to get listing of all quote
        if(Auth::user()->checkRole(1) ){

         $listing  = Offer::where('concerned_client', Auth::user()->id)->where('offer_state', $state)->get();  
       
        }

        else {
            $listing = Offer::where('offer_state', $state)->get();
        }

         $cpt = 1;  
          foreach($listing as $data){
            
            // Adding needed value to tab
              array_push($result,
                [ 
                    'row_id' => $cpt,
                    'offer_id' => $data->id, 
                    'label' => $data->label ,
                    'description' =>  $data->description , 
                    'reference' =>$data->reference ,
                    'state' => $data->offer_state ,
                    'due_date' => $data->due_date ,
                    'company' => $data->company->name 
                ]) ;
                $cpt= $cpt+1;
          }
      
                
        // return json tab with datatable method
        return datatables($result)->setRowId('row_id')->toJson();
    }


    public function downloadPDF(Offer $offer){

        $pdf = \App::make('dompdf.wrapper');

  

        $myCompany = Company::where('company_type', 'main_company')->first();

        $pdf = \PDF::loadView('pdf.documentOffer', ['offer'=> $offer, 'myCompany'=> $myCompany ,   'totalCost' =>$totalCP ,
        'totalSell' => $totalSP] ); 
        return $pdf->stream();
    }

}
