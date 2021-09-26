<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;

class ServiceCategoryController extends Controller
{
    public function index()  {      
       
        $servicesCat = ServiceCategory::all();
  
        return view('service-cat.index', [
            'pageTitle' => 'Listing services categorie',
            'pageTabTitle' => 'Listing services categorie',
            'services'=>         $servicesCat,
      
        ]);
    }


    public function create(){
        return view('service-cat.form', [
            'pageTitle' => 'Create service category',
           
        ]);
    }


    public function show($id){

        return view('service-cat.show', [
            'pageTitle' => 'Single service cat ',
            'serviceCat'=>  ServiceCategory::where('id' , $id )->first(),
        ]);
    }


    public function edit($id){

        return view('service-cat.form', [
            'pageTitle' => 'Edit service',
            'serviceCat'=>  ServiceCategory::where('id' , $id )->first(),
        ]);
    }


    public function store(Request $request){
     
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'label'=> 'required',        
            'description'=> 'required',
                   
        ];

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();         
       
        $newServiceCat = ServiceCategory::create($request->all());        
    
        return redirect()->intended('/managements/services-categories/single/'.$newServiceCat->id);
    }



    public function update(Request $request, ServiceCategory $serviceCat){

        $serviceCat = ServiceCategory::where('id', $serviceCat->id)->first();

       

        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'label'=> 'required',        
            'description'=> 'required',
              
        ];

        $validator = \Validator::make($request->all(), $rules, $messages)->validate();         
  
        $serviceCat->update($request->all());
        return redirect()->intended('/managements/services-categories/single/'.$serviceCat->id);
    }


}
