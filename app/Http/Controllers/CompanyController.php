<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Employe;
class CompanyController extends Controller
{
    //

    public function index()
    {      
        return view('company.index', [
            'pageTitle' => 'Listing companies',
            'companies'=>    $companies = Company::all(),
        ]);
    }

    public function show($id)
    {
        return view('company.show', [
            'pageTitle' => 'Single company',
            'company'=>  $company = Company::where('id' , $id )->first(),
        ]);
    }


    public function create(){

        return view('company.form', [
            'pageTitle' => 'Create company',
           
        ]);
    }

    public function edit($id){

        return view('company.form', [
            'pageTitle' => 'Update company',
            'company'=>  $company = Company::where('id' , $id )->first(),
        ]);
    }

    public function update(Request $request, Company $company)   {

        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'name'=> 'required|string',        
            'vat'=> 'required',
            'street_name'=> 'required',
            'street_number'=> 'required',
            'zip_code'=> 'required',
            'locality'=> 'required',
            'email'=> 'required|email',
            'company_type'=> 'required',
            'active' => 'required',
        ];


        $validator = \Validator::make($request->all(), $rules, $messages)->validate();  
             
        $company->update($request->all());
    
        return redirect()->intended('/company/'.$company->id);
    }

    public function store(Request $request){
     

        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'name'=> 'required|string',        
            'vat'=> 'required',
            'street_name'=> 'required',
            'street_number'=> 'required',
            'zip_code'=> 'required',
            'locality'=> 'required',
            'email'=> 'required|email',
            'company_type'=> 'required',
            'active' => 'required',
        ];


        $validator = \Validator::make($request->all(), $rules, $messages)->validate();         
        $newCompany = Company::create($request->all());        
    
        return redirect()->intended('/company/'.$newCompany->id);
    }

    public function archive(Company $company){

        $company->active = 0;
        $company->save();
        return redirect()->intended('/company/'.$company->id);
    }

    public function enable(Company $company){

        $company->active = 1;
        $company->save();
        return redirect()->intended('/company/'.$company->id);
    }



    public function assignEmploye(Request $request){


        $company = Company::where('id', $request->company_id)->first();
        $newWorker =  Employe::where('user_id', $request->user_id)->where('company_id', $company->id)->first() ;
        

        // If user already exist will not add it
        if(!isset($newWorker)){

                $messages = [
                    'required' => 'Ce champs ne peut etre vide',
                ];


                $rules = [
                    'company_id'=> 'required',        
                    'user_id'=> 'required',        
                ];
                $validator = \Validator::make($request->all(), $rules, $messages)->validate();        
                $newEmploye =  Employe::create($request->all());
        }

         return redirect()->intended('/company/single/'.$request->company_id);

    }

    

}