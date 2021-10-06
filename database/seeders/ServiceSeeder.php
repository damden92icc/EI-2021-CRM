<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
        

        [
           
            'label' => 'Website creation  ',
            'description' => 'Website developpement for all type of website',          
            'recurrent' => 0,
            'active' => 1,
            'category_id' => 3,
            'validity_delay' => 0
        ],

        [
  
            'label' => 'Custom Module creation  ',
            'description' => 'Integreate new features in your website',          
            'recurrent' => 0,
            'active' => 1,
            'category_id' => 3,
            'validity_delay' => 0
        ],

        [
  
            'label' => 'Website Sketch Template  ',
            'description' => 'Sketching new brand design for your website',          
            'recurrent' => 0,
            'active' => 1,
            'category_id' => 4,
            'validity_delay' => 0
        ],

  
        [
            'label' => 'Hosting CMS plateform',
            'description' => 'Hosting for Wordpress, Joomla, ... and other cms without e-commerce',          
            'recurrent' => 1,
            'active' => 1,
            'category_id' => 1 ,
            'validity_delay' => 365
        ],

        [
   
            'label' => 'Hosting E-commerce plateform',
            'description' => 'Hosting for e-commerce plateform like Wocoomerce , Prestashop , .... ',          
            'recurrent' => 1,
            'active' => 1,
            'category_id' => 1 ,
            'validity_delay' => 365
        ],

        [
  
            'label' => 'DNS - Domaine name serveur  ',
            'description' => 'Domaine name serveur :  www.mywebsite.com  ',          
            'recurrent' => 1,
            'active' => 1,
            'category_id' => 5 ,
            'validity_delay' => 365
        ],
       
        [

            'label' => 'Email addresse - 5 Go ',
            'description' => 'Adresse email linked with the DNS ',          
            'recurrent' => 1,
            'active' => 1,
            'category_id' => 6,
            'validity_delay' => 365
        ],

        [

            'label' => 'DNS - Email addresse (Microsoft - 100 Go )  ',
            'description' => 'Adresse email linked with the DNS provided by Microsoft',          
            'recurrent' => 1,
            'active' => 1,
            'category_id' => 6,
            'validity_delay' => 365
        ],

        [
    
            'label' => 'Debugging Website (Qt = hours )  ',
            'description' => 'Handle website issues on a plateforme   ',          
            'recurrent' => 0,
            'active' => 1,
            'category_id' => 3,
            'validity_delay' => 0
        ],

        [

            'label' => 'Update Website (Qt = hours )  ',
            'description' => 'Update website  on a plateforme   ',          
            'recurrent' => 0,
            'active' => 1,
            'category_id' => 3,
            'validity_delay' =>0
        ],

        [
 
            'label' => ' Transfert a Website to this company  ',
            'description' => 'Transfert your website on DamDen CRM  ',          
            'recurrent' => 0,
            'category_id' => 3,
            'active' => 1,
            'validity_delay' => 0
        ],



        [
       
            'label' => 'SSL Certificate ( Standards)  ',
            'description' => 'SLL certificate for all web plateforme except e-commerce',          
            'recurrent' => 1,
            'active' => 1,
            'category_id' => 2,
            'validity_delay' =>365
        ],

        [
    
            'label' => 'SSL Certificate ( E-commerce)  ',
            'description' => 'SLL certificate for e-commerce',          
            'recurrent' => 1,
            'active' => 1,
            'category_id' => 2,
            'validity_delay' => 365
        ],


      
    ];


    foreach($services as $data){
        DB::table('services')->insert([
            'label' => $data['label'],
            'description'=> $data['description'],   
            'recurrent'=> $data['recurrent'],   
            'active'=> $data['active'],   
            'category_id' =>  $data['category_id'],   
            'validity_delay'=> $data['validity_delay'],               
        ]);
    }
    }
}
