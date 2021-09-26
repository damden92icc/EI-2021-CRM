<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;

class ServiceCategoryController extends Controller
{
    public function index()
    {      
       

        $servicesCat = ServiceCategory::all();
  
        return view('service-cat.index', [
            'pageTitle' => 'Listing services categorie',
            'pageTabTitle' => 'Listing services categorie',
            'services'=>         $servicesCat,
      
        ]);
    }
}
