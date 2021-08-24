<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bills = [
            [
                'label' => 'Bill Website Fimz',
                'reference' => 'A201545'
            ],
            [
                'label' => 'Bill Website XYZ',
                'reference' => 'A2015445'
            
            ],
            [
                'label' => 'Bill Website ATD',
                'reference' => 'B201545'
  
            ],
            [
                'label' => 'Bill website Aristo',
                'reference' => 'CA201545'
            ],
        ];

        $arrayFakeCompany = [ 2, 3, 4, 5];
        foreach($bills as $data){
            DB::table('bills')->insert([
                'label' => $data['label'],
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",   
                'reference'=> $data['reference'],
                'sended_date'=>  Carbon::parse('2000-01-01') ,
                'bill_state'=> "IN PROGRESS",                
                'total_cost_ht'=> 200,
                'total_sell_ht'=> 1000,
                'validity_delay'=> 30,
                'due_date'=>  Carbon::parse('2000-01-01') ,
                'owner_id'=>1,
                'concerned_company' =>    Arr::random($arrayFakeCompany),       
            ]);
        }
    }
}
