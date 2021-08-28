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
                'description' => ' Lorem Ipsum dolor',
                'reference' => 'A0010',
                'sended_date' => Carbon::parse('2000-01-01') ,             
                'quote_state' => 'Draft'
            ],

            [
                'label' => 'Devis 2',
                'description' => ' Lorem Ipsum dolor',
                'reference' => 'A0015',
                'sended_date' => Carbon::parse('2000-01-01') ,             
                'quote_state' => 'Draft'
            ],

            [
                'label' => 'Devis 3',
                'description' => ' Lorem Ipsum dolor',
                'reference' => 'A00410',
                'sended_date' => Carbon::parse('2000-01-01') ,             
                'quote_state' => 'Draft'
            ],
          
            [
                'label' => 'Devis 5',
                'description' => ' Lorem Ipsum dolor',
                'reference' => 'A0890Z10',
                'sended_date' => Carbon::parse('2000-01-01') ,             
                'quote_state' => 'Draft'
            ],

            [
                'label' => 'Devis 6',
                'description' => ' Lorem Ipsum dolor',
                'reference' => 'A00z10',
                'sended_date' => Carbon::parse('2000-01-01') ,             
                'quote_state' => 'Draft'
            ],

            [
                'label' => 'Devis Ecomm',
                'description' => ' Lorem Ipsum dolor',
                'reference' => 'A00AA15',
                'sended_date' => Carbon::parse('2000-01-01') ,             
                'quote_state' => 'Draft'
            ],

            [
                'label' => 'Devis 7',
                'description' => ' Lorem Ipsum dolor',
                'reference' => 'A00aDS41fg0',
                'sended_date' => Carbon::parse('2000-01-01') ,             
                'quote_state' => 'Draft'
            ],
          
            [
                'label' => 'Devis 9',
                'description' => ' Lorem Ipsum dolor',
                'reference' => 'A00sqZ10',
                'sended_date' => Carbon::parse('2000-01-01') ,             
                'quote_state' => 'Draft'
            ],
        ];


        $arrayFakeCompany = [ 2, 3];
        $arrayFakeClients = [ 2, 3];
        foreach($quotes as $data){
            DB::table('quotes')->insert([
                'label' => $data['label'],
                'description' => $data['description'],
                'reference' => $data['reference'],
                'sended_date' => $data['sended_date'],
                'quote_state' => $data['quote_state'],
                'owner_id' =>  Arr::random($arrayFakeClients),    
                'concerned_company' =>    Arr::random($arrayFakeCompany),                   
            ]);
        }
    }
}
