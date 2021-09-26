<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Employe;
use App\Models\Role;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {      

        $users = User::all();
        return view('users.index', [
            'pageTitle' => 'Listing users',
            'pageTabTitle' => 'Listing users',
            'users'=>   $users,
      
        ]);
    }


    public function show($id){  


        $user = User::where('id' , $id )->first();
        $countEmploy= count( Employe::where('user_id', $id)->get() );

        if( $countEmploy > 0){
          
            $employes=  Employe::where('user_id', $id)->get();
            $employes = $employes->load( 'company');

        }
        else{
            
            $employes =" empty role and assignement";
        }

        return view('users.show', [
            'pageTitle' => 'Single User',
            'user'=> $user ,
            'pageTabTitle'=> 'Listing employements',
            'employements'=>  $employes=  Employe::where('user_id', $id)->get(),
        ]);
    }

    public function create(){

        $roles = Role::all();

        return view('users.form', [
            'pageTitle' => 'Create users',
             'roles' => $roles,    
             'companies'=>    $companies = Company::all(),
        ]);
    }


    public function store(Request $request){
       
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'name'=> 'required',        
            'firstname'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'phone'=> 'required',
            'mobile'=> 'required',
            'role_id'=> 'required',
            'company_id'=> 'required',
        ];

        // Add hash to create the password 
        $request->merge([
            'password' =>   Hash::make($request->get('password')),
        ]);
       
        $validator = \Validator::make($request->all(), $rules, $messages)->validate();   

        $newUser = User::create($request->all());  

        $request->merge([
            'user_id' =>   $newUser->id,
        ]);

        $newEmploye =  Employe::create($request->all());

        return redirect()->intended('/users/single/'.$newUser->id);
    }


    public function myprofil(){
        $uID = auth()->user()->id;

        $user = User::where('id' ,     $uID  )->first();
        $countEmploy= count( Employe::where('user_id',     $uID )->get() );
        if( $countEmploy > 0){
          
            $employes=  Employe::where('user_id',     $uID )->get();
            $employes = $employes->load( 'company');

        }
        else{
            
            $employes =" empty role and assignement";
        }

        return view('profil.show', [
            'pageTitle' => 'My Profil',
            'user'=> $user ,
            'pageTabTitle'=> 'Listing employements',
            'employements'=>  $employes=  Employe::where('user_id',     $uID )->get(),
        ]);
    }


    public function edit(User $user){

     $roles = Role::all();
            return view('users.form', [
                'pageTitle' => 'Update users',
                'roles' => $roles,    
                'user'=> $user,
                'companies'=>    $companies = Company::all(),     
        ]);
    }

    public function update(Request $request, User $user){

       // $user = Auth::user();
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'name'=> 'required',        
            'firstname'=> 'required',       
            'phone'=> 'required',
            'mobile'=> 'required',     
            'password'=> 'required',          
        ];
               
        $validator = \Validator::make($request->all(), $rules, $messages)->validate();   

        $user->update($request->all());
        return redirect()->intended('/users/single/'.$user->id);
    }




    public function updateMyProfil(Request $request){

        $user = Auth::user();
        $messages = [
            'required' => 'Ce champs ne peut etre vide',
        ];

        $rules = [
            'name'=> 'required',        
            'firstname'=> 'required',       
            'phone'=> 'required',
            'mobile'=> 'required',     
            'password'=> 'required',          
        ];
               
        $validator = \Validator::make($request->all(), $rules, $messages)->validate();   

        $user->update($request->all());
        return redirect()->intended('/my-profil/');
    }

    public function askRemoveAccount(User $user){
        $user->user_state ="Remove Asked";
        $user->save();
        return redirect()->intended('/my-profil/');
    }


    public function disableAccount(User $user){
        $user->user_state ="Disable";
        $user->save();
        return redirect()->intended('/users/single/'.$user->id);

    }



    public function selectableClient(Request $request){

        $id =  json_decode( $request->input('search'));
        $company = Company::where('id', $id  )->first();
 
        $workers = Employe::where('company_id', $company->id)->get();

        $tabWorker = [];

        foreach($workers as $data){

            $data['name'] = $data->users->name; 
            $data['firstname'] = $data->users->firstname; 
            
            array_push($tabWorker,$data) ;
        }
        return    $tabWorker ;
    }




    public function s2_assignementEmployement(Request $request){
     
        $workers = User::where('user_state', "ACTIVE")->get();
        $tabWorker = [];

        foreach($workers as $data){
                  
            $data['name'] = $data->name; 
            $data['firstname'] = $data->firstname; 
            
            array_push($tabWorker,$data) ;
        }

        return    $tabWorker ;
    }
}
