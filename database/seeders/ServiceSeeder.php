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
            'label' => 'Hosting CMS Plateform',
            'description' => 'Hosting for Wordpress, Joomla, ... and other cms without e-commerce',          
            'recurrent' => 1,
            'active' => 1,
            'category_id' => 1 ,
            'validity_delay' => 365
        ],
        [
            'label' => 'Hosting CMS E-commerce',
            'description' => 'Hosting for e-commerce plateform like Wocoomerce , Prestashop , .... ',          
            'recurrent' => 1,
            'active' => 1,
            'category_id' => 1 ,
            'validity_delay' => 365
        ],

        [
            'label' => 'Hosting Odoo Plateform',
            'description' => 'Hosting Odoo Community plateforme',          
            'recurrent' => 1,
            'category_id' => 1 ,
            'active' => 1,
            'validity_delay' => 365
        ],

        [
            'label' => 'DNS - name ',
            'description' => 'Domaine name serveur ',          
            'recurrent' => 1,
            'active' => 1,
            'category_id' => 5 ,
            'validity_delay' => 365
        ],
       
        [
            'label' => 'DNS - Email addresse - 5 Go ',
            'description' => 'Adresse email linked with the DNS ',          
            'recurrent' => 1,
            'active' => 1,
            'category_id' => 6,
            'validity_delay' => 365
        ],
        [
            'label' => 'DNS - Email addresse - 50 Go ',
            'description' => 'Adresse email linked with the DNS ',          
            'recurrent' => 1,
            'active' => 1,
            'category_id' => 6,
            'validity_delay' => 365
        ],

        [
            'label' => 'DNS - Email addresse (Microsoft - 100 Go )  ',
            'description' => 'Adresse email linked with the DNS ',          
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
            'label' => ' Transfert Website to this company  ',
            'description' => 'Transfert your website on DamDen CRM  ',          
            'recurrent' => 0,
            'category_id' => 3,
            'active' => 1,
            'validity_delay' => 0
        ],

        [
            'label' => 'Transfert Website from A register to another ',
            'description' => 'Adresse email linked with the DNS ',          
            'recurrent' => 0,
            'active' => 1,
            'category_id' => 3,
            'validity_delay' =>0
        ],

        [
            'label' => 'SSL Certificate ( Standards)  ',
            'description' => 'SLL certificate for all webplateforme except e-commerce',          
            'recurrent' => 1,
            'active' => 1,
            'category_id' => 2,
            'validity_delay' =>0
        ],

        [
            'label' => 'SSL Certificate ( E-commerce)  ',
            'description' => 'SLL certificate for e-commerce',          
            'recurrent' => 1,
            'active' => 1,
            'category_id' => 2,
            'validity_delay' => 365
        ],

        [
            'label' => 'Website creation  ',
            'description' => 'SLL certificate for e-commerce',          
            'recurrent' => 0,
            'active' => 1,
            'category_id' => 3,
            'validity_delay' => 0
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
