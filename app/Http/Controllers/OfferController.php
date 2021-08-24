<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use App\Models\Company;
use App\Models\Service;
use App\Models\OfferService;
use App\Models\Employe;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function index()
    {      

        $offers = Offer::all();  
        return view('offer.index', [
            'pageTitle' => 'Listing Offers',
            'pageTabTitle' => 'Listing Offers',
            'offers'=>        $offers ,
      
        ]);
    }

    public function show($id)
    {      

        $offer = Offer::where('id', $id)->first();  

        $cptCost = count( OfferService::where('offer_id', $id)->get());

        $totalCP = 0;
        $totalSP = 0;
        if($cptCost > 0){
            $services = OfferService::where('offer_id', $id)->get();
            
                foreach($services as $service){
                    $totalCP += ( $service->unit_cost_ht * $service->quantity);
                    $totalSP +=( $service->unit_sell_ht * $service->quantity);
                }
        }


        $selectableServices = Service::all();
        return view('offer.show', [
            'pageTitle' => 'Single Offers',
            'pageTabTitle' => 'Listing services ',
            'servicesSelectable' =>  $selectableServices,
            'totalCost' =>$totalCP ,
            'totalSell' => $totalSP,
            'offer'=>        $offer ,
      
        ]);
    }

    public function create(){

        $selectableCompanies = Company::all();
        return view('offer.form', [
            'pageTitle' => 'Create offer',
           'companies' => $selectableCompanies ,
        ]);
    }


    public function myOffer(){
        $user = Auth::user();
        $myOffer = Offer::where([['concerned_client', $user->id ],['offer_state', 'SENDED']])->get();
    
        return view('offer.index', [
            'pageTitle' => 'Listing Offers',
            'pageTabTitle' => 'Listing Offers',
            'offers'=> $myOffer ,      
        ]);
    }




    public function store(Request $request){
     
 
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'label' => 'required',        
            'description'=> 'required',
            'offer_priority_state' => 'required',
            'validity_delay' => 'required',
            'due_date' => 'required',
            'concerned_company' => 'required',
            'concerned_client' => 'required'
                    
        ];

    $request->merge( ['reference' =>  Str::random(20)] + [ 'owner_id' =>  auth()->user()->id] );

    $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
   
    $newOffer =Offer::create($request->all());
    return redirect()->intended('/offers/'.$newOffer->id);
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
            'label' => 'required',        
            'description'=> 'required',
            'offer_priority_state' => 'required',
            'validity_delay' => 'required',
            'due_date' => 'required',                
        ];


        $validator = \Validator::make($request->all(), $rules, $messages)->validate();     

        $offer->update($request->all());

        return redirect()->intended('/offers/'.$offer->id);
    }


    public function storeServiceDoc(Request $request){

        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'quantity' => 'required',        
            'service_id'=> 'required',
            'offer_id' => 'required',
                    
        ];

    $validator = \Validator::make($request->all(), $rules, $messages)->validate();     

    $newService =OfferService::create($request->all());

        return redirect()->intended('/offers/'.$request->offer_id);
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
                'quantity' => 'required',     
                'unit_cost_ht' => 'required',     
                'unit_sell_ht' => 'required',        
                'service_id'=> 'required',
                        
            ];
    
            $validator = \Validator::make($request->all(), $rules, $messages)->validate();     
       
    
            $sl->update($request->all());
    
            return redirect()->intended('/offers/'.$sl->offer_id);
        }

/**
 * Change state
 */



    public function sendDocument (Offer $offer){
        $offer->offer_state = "SENDED";
        $offer->sended_date =Carbon::now() ;
        $offer->save();    
        return redirect()->intended('/offers/'.$offer->id);
    }

    public function valideDocument (Offer $offer){

        $offer->offer_state = "VALIDED";
        $offer->save();    
        return redirect()->intended('/offers/'.$offer->id);
    }


    public function archiveDocument (Offer $offer){

        $offer->offer_state = "ARCHIVED";
        $offer->save();    
        return redirect()->intended('/offers/'.$offer->id);
    }

    public function acceptOffer (Offer $offer){

        $offer->offer_state = "Accepted";
        $offer->save();    
        return redirect()->intended('/offers/'.$offer->id);
    }

    public function declineOffer (Offer $offer){

        $offer->offer_state = "Refused";
        $offer->save();    
        return redirect()->intended('/offers/'.$offer->id);
    }

    public function askUpdate (Offer $offer){

        $offer->offer_state = "Accepted";
        $offer->save();    
        return redirect()->intended('/offers/'.$offer->id);
    }
}
