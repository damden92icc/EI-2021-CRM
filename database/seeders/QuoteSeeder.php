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
                'reference' => 'A00Z10',
                'sended_date' => Carbon::parse('2000-01-01') ,             
                'quote_state' => 'Draft'
            ],
        ];


        $arrayFakeCompany = [ 2, 3, 4, 5];
        foreach($quotes as $data){
            DB::table('quotes')->insert([
                'label' => $data['label'],
                'description' => $data['description'],
                'reference' => $data['reference'],
                'sended_date' => $data['sended_date'],
                'quote_state' => $data['quote_state'],
                'owner_id' => 1,
                'concerned_company' =>    Arr::random($arrayFakeCompany),                   
            ]);
        }
    }
}
