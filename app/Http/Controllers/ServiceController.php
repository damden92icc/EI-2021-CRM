<?php

namespace App\Http\Controllers;
use App\Models\Service;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {      

        $services = Service::all();
  
        return view('service.index', [
            'pageTitle' => 'Listing services',
            'pageTabTitle' => 'Listing services',
            'services'=>        $services ,
      
        ]);
    }

    public function show($id){
        return view('service.show', [
            'pageTitle' => 'Single service',
            'service'=>  $service = Service::where('id' , $id )->first(),
        ]);
    }

    public function create(){
        return view('service.form', [
            'pageTitle' => 'Create service',
           
        ]);
    }


    public function edit($id){

        return view('service.form', [
            'pageTitle' => 'Edit service',
            'service'=>  $service = Service::where('id' , $id )->first(),
        ]);
    }


    public function store(Request $request){
     
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'label'=> 'required',        
            'description'=> 'required',
            'recurrent'=> 'required',
            'active'=> 'required',
            'validity_delay'=> 'required',           
        ];

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();         
       
        $newService = Service::create($request->all());        
    
        return redirect()->intended('/managements/services/single/'.$newService->id);
    }


    public function update(Request $request, Service $service){

        $service = Service::where('id', $service->id)->first();

       

        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'label'=> 'required',        
            'description'=> 'required',
            'recurrent'=> 'required',
            'active'=> 'required',
            'validity_delay'=> 'required',           
        ];

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();         
  
        $service->update($request->all());
        return redirect()->intended('/managements/services/single/'.$service->id);
    }

    public function editState(Service $service,  String $state){

      //  dd($service);

      //  $service = Service::where('id', $service->id)->first();

      
         $service->active = $state;

        $service->save();
        return redirect()->intended('/managements/services/single/'.$service->id);
    }
    
}
