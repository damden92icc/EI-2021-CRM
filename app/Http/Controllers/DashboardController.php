<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $user= Auth::user();

        if($user == null){
            return view('home');
        }

        else{
            return view('dashboard.index', [
                'pageTitle' => 'Dashboard',
                'user'=>        $user ,
        
            ]);
        }
      
    }


}
