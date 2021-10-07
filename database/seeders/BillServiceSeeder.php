<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $servicesSeeder=[

            // Bill 1 - H&M
            [
              'total_sp_ht'  => 1400,
              'vat_rate' => 21 , 
              'ps_id' => 1,
              'bill_id'=> 1
            ],

            [
                'total_sp_ht'  => 400,
                'vat_rate' => 21 , 
                'ps_id' => 2,
                'bill_id'=> 1
            ],

            [
                'total_sp_ht'  => 1400,
                'vat_rate' => 21 , 
                'ps_id' => 6,
                'bill_id'=> 1
            ],

            [
                'total_sp_ht'  => 400,
                'vat_rate' => 21 , 
                'ps_id' => 7,
                'bill_id'=> 1
            ],


            // Bill 2 - H&M 
            [
                'total_sp_ht'  => 1400,
                'vat_rate' => 21 , 
                'ps_id' => 11,
                'bill_id'=> 2
            ],

            [
                'total_sp_ht'  => 400,
                'vat_rate' => 21 , 
                'ps_id' => 12,
                'bill_id'=> 2
            ],
  
            
        ];


        foreach($servicesSeeder as $data){
            DB::table('bill_services')->insert([
                'total_sp_ht' => $data['total_sp_ht'] ,            
                'vat_rate' => $data['vat_rate'] ,     
                'ps_id' => $data['ps_id'] ,   
                'bill_id' => $data['bill_id'] ,        
            ]);
        }

    }
}
