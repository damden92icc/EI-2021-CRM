<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quotes = [
            [
                'label' => 'Devis 1',
      
                'reference' => 'A0010',
                'sended_date' =>null ,             
                'quote_state' => 'Draft'
            ],

            [
                'label' => 'Devis 2',
                'reference' => 'A0015',
                'sended_date' =>null ,            
                'quote_state' => 'Draft'
            ],

            [
                'label' => 'Devis 3',
                'reference' => 'A00410',
                'sended_date' =>null ,          
                'quote_state' => 'Draft'
            ],
          
            [
                'label' => 'Devis 5',
                'reference' => 'A0890Z10',
                'sended_date' =>null ,          
                'quote_state' => 'Draft'
            ],

            [
                'label' => 'Devis 6',
                'reference' => 'A00z10',
                'sended_date' =>null ,             
                'quote_state' => 'Draft'
            ],

            [
                'label' => 'Devis Ecomm',
                'reference' => 'A00AA15',
                'sended_date' =>null ,          
                'quote_state' => 'Draft'
            ],

            [
                'label' => 'Devis 7',
                'reference' => 'A00aDS41fg0',
                'sended_date' => Carbon::parse('2021-03-01') ,             
                'quote_state' => 'SENDED'
            ],
          
            [
                'label' => 'Devis 9',
                'reference' => 'A00sqZ10',
                'sended_date' => Carbon::parse('2021-03-01') ,             
                'quote_state' => 'SENDED'
            ],

            [
                'label' => 'Devis 10',
                'reference' => 'A0078KsqZ10',
                'sended_date' => Carbon::parse('2021-03-01') ,             
                'quote_state' => 'SENDED'
            ],

            [
                'label' => 'Devis 11',
                'reference' => 'A07Z0sqZ10',
                'sended_date' => Carbon::parse('2021-03-01') ,             
                'quote_state' => 'ARCHIVED'
            ],

            [
                'label' => 'Devis 12',
                'reference' => 'A00PMsqZ10',
                'sended_date' => Carbon::parse('2021-03-01') ,             
                'quote_state' => 'ARCHIVED'
            ],
        ];


        $arrayFakeCompany = [ 2, 3];
        $arrayFakeClients = [ 2, 3];
        foreach($quotes as $data){
            DB::table('quotes')->insert([
                'label' => $data['label'],
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
                'reference' => $data['reference'],
                'sended_date' => $data['sended_date'],
                'quote_state' => $data['quote_state'],
                'owner_id' =>  Arr::random($arrayFakeClients),    
                'concerned_company' =>    Arr::random($arrayFakeCompany),                   
            ]);
        }
    }
}
