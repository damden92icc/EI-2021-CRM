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

        // Quote for client 1
        $quotes = [
            [
                'label' => 'New website Paul&Co',      
                'reference' => 'A0010',
                'sended_date' =>null ,             
                'quote_state' => 'DRAFT',
                'description' => 'My new client want a new website www.paul-co.be , could you send me an offer based on this quote ? He wants a new design based on the color blue and the theme bakery'
            ],

            [
                'label' => 'Online coffee shop',
                'reference' => 'A0015',
                'description' => 'I work for a new coffee company, they want to digititalize their activity online, I will provide you a HTML front-end for this project',
                'sended_date' =>null ,            
                'quote_state' => 'DRAFT'
            ],

            [
                'label' => 'Transfert and upgrade Pizza-shopa',
                'reference' => 'A00410',
                'description' => 'Hello , help ! My client need to transfert his website to a new hosting because they have a lot of timeout with their current provider. This an online plateforme to order pizza , I will need a new hosting and the security with it. The domaine will be also transfered to your service',
                'sended_date' =>null ,          
                'quote_state' => 'DRAFT'
            ],
          
            [
                'label' => 'New website templated for terence-view ',
                'reference' => 'A0890Z10',
                'description' => 'My client want a new brand design for his website. He have a litle shop in the center of Brussel and create beautiful painting.',
                'sended_date' =>null ,          
                'quote_state' => 'DRAFT'
            ],

            [
                'label' => 'New wordpress for sunny.be ',
                'reference' => 'A00z10',
                'description' => 'Hi , my client want to create a new website with wordpress. He needs the domaine name, hosting, security and the initial installation of wordpress. He want to design the website himself ',
                'sended_date' =>null ,             
                'quote_state' => 'DRAFT'
            ],

            [
                'label' => 'Ecommerce website for Calton Hotel',
                'reference' => 'A00aDS4za1fg0',
                'description' => 'The Calton hotel want to digital their activity, Their sell room they already have a working website but they need the SSL and a powerfull server. Their current website should be transfered to your service and hosted in your company',
                'sended_date' => Carbon::parse('2021-03-01') ,             
                'quote_state' => 'SENT'
            ],

        ];

        // Seeding quote for client 1 working for 2-3 
        $clienID = 2;
        $workingFor = [2,3] ; 


        foreach($quotes as $data){
            DB::table('quotes')->insert([
                'label' => $data['label'],
                'description' =>  $data['description'],
                'reference' => $data['reference'],
                'created_at' => Carbon::now()->subdays(15), 
                'updated_at' => Carbon::now()->subdays(1), 
                'sended_date' => $data['sended_date'],
                'quote_state' => $data['quote_state'],
                'owner_id' =>        $clienID ,    
                'concerned_company' =>    Arr::random($workingFor),                   
            ]);
        }


        // Quote for client 2
        $quotes=[
            [
                'label' => 'New design for futur website',
                'reference' => 'A00aDS41fg0',
                'description' => 'Imperium SPRL is a homedae clothing shop, they would like a sketch in the purpose of create a new e-commerce website to sell their creation',
                'sended_date' => null,             
                'quote_state' => 'DRAFT'
            ],
          
            [
                'label' => 'Transfert into a performante plateform',
                'reference' => 'A00sqZ10',
                'description' => 'Sunatra ASBL have a website but they have problem loading their content because of the server performances. They also would like add the security cadenas with and SSL certificate',
                'sended_date' => Carbon::parse('2021-03-01') ,             
                'quote_state' => 'SENT'
            ],

            [
                'label' => 'New website presentation H&L ice',
                'reference' => 'A0078KsqZ10',
                'description' => 'H&L Ice is a company working in the delivery homeade ICE. They would like a new website with all requierement in security and hosting. Can you sent me an offer based on the requierements bellow? ' , 
                'sended_date' => Carbon::parse('2021-03-01') ,             
                'quote_state' => 'SENT'
            ],

        ];



    // Seeding quote for client 2 working for 4-5
        $clienID = 3;
        $workingFor = [4,5] ; 

        foreach($quotes as $data){
            DB::table('quotes')->insert([
                'label' => $data['label'],
                'description' => $data['description'],
                'reference' => $data['reference'],
                'created_at' => Carbon::now()->subdays(15), 
                'updated_at' => Carbon::now()->subdays(1), 
                'sended_date' => $data['sended_date'],
                'quote_state' => $data['quote_state'],
                'owner_id' => $clienID,    
                'concerned_company' =>    Arr::random($workingFor),                   
            ]);
        }
    }
}
