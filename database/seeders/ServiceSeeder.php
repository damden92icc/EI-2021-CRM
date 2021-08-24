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
            'label' => 'Hosting CMS',
            'description' => 'Lorem ipsum dolor sed at vetrus',          
            'recurrent' => 1,
            'active' => 1,
            'validity_delay' => 30
        ],
        [
            'label' => 'Hosting E-commerce',
            'description' => 'Lorem ipsum dolor sed at vetrus',          
            'recurrent' => 1,
            'active' => 1,
            'validity_delay' => 30
        ],

        [
            'label' => 'Hosting Odoo Plateform',
            'description' => 'Lorem ipsum dolor sed at vetrus',          
            'recurrent' => 1,
            'active' => 1,
            'validity_delay' => 30
        ],

        [
            'label' => 'DNS - name ',
            'description' => 'Lorem ipsum dolor sed at vetrus',          
            'recurrent' => 1,
            'active' => 1,
            'validity_delay' => 30
        ],
       
        [
            'label' => 'DNS - Email addresse ',
            'description' => 'Lorem ipsum dolor sed at vetrus',          
            'recurrent' => 1,
            'active' => 1,
            'validity_delay' => 30
        ],
    ];


    foreach($services as $data){
        DB::table('services')->insert([
            'label' => $data['label'],
            'description'=> $data['description'],   
            'recurrent'=> $data['recurrent'],   
            'active'=> $data['active'],   
            'validity_delay'=> $data['validity_delay'],               
        ]);
    }
    }
}
