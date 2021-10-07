<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

            // Bill 1 for H&m
            [
                'label' => 'Bill Creation website Alteria',
                'reference' => 'B1-OCT-2021-01',
                'description' => 'Bill about the visual and the developpement for the new website Alteria Corporation',
                'sended_date' =>  Carbon::parse('2021-01-01'),
                'bill_state'=> "ARCHIVED",              
                'total_sell_ht' => 3600,
                'due_date'=>  Carbon::parse('2021-02-01'),                      
                'concerned_company'=>2
            ],

            // Bill 2 for H&m
            [
                'label' => 'Bill Website Mining Hairstayle',
                'reference' => 'B1-OCT-2021-02',
                'description' => 'Bill about the visual and the developpement for the new Website Mining Hairstayle',
                'sended_date' =>  Carbon::parse('2021-01-01'),
                'bill_state'=> "ARCHIVED",              
                'total_sell_ht' => 1800,
                'due_date'=>  Carbon::parse('2021-02-01'),                      
                'concerned_company'=>2
            ],        
             

        ];


        foreach($bills as $data){
            DB::table('bills')->insert([
                'label' => $data['label'],
                'reference'=> $data['reference'],
                'description' => $data['description'],            
                'sended_date'=>  $data['sended_date'],
                'bill_state'=>  $data['bill_state']  ,    
                'total_sell_ht'=>  $data['total_sell_ht']  ,    
                'total_cost_ht'=>  0,            
                'validity_delay'=> 30,
                'due_date'=>   $data['due_date'],       
                'owner_id'=>1,
                'concerned_company' =>   $data['concerned_company'],       
            ]);
        }
    }
}
