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
    
        return redirect()->intended('/managements/services/'.$newService->id);
    }

    
}
