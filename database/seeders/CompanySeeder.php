<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $seederDatas = [


            /**
             *  Seeding  Main Company 
             */
            [
                'name'=> 'Damien Entreprise',        
                'vat' => 'BE501122335455',
                'street_name' => 'Rue de Florence',
                'street_number' => "78",
                'zip_code' => 1000,
                'locality' => 'Brussels',
                'email' => 'company@damien.com',
                'company_type' => 'main_company',
                'active' => 1, 
            ],
             

            /**
             *  Start Seeding Client
             */
            [
                'name'=> 'H&M Coiffure',        
                'vat' => 'BE0011223355',
                'street_name' => 'Rue du Bailli',
                'street_number' => "23 B",
                'zip_code' => 1000,
                'locality' => 'Brussels',
                'email' => 'company@hmcoiff.com',
                'company_type' => 'client',
                'active' => 1, 
            ],

            [
                'name'=> 'King Burger Dog',        
                'vat' => 'BE001122893355',
                'street_name' => 'Rue de Livourne',
                'street_number' => "158 B",
                'zip_code' => 1000,
                'locality' => 'Brussels',
                'email' => 'company@kingdog.com',
                'company_type' => 'client',
                'active' => 1, 
            ],

            [
                'name'=> 'Pizza Folia',        
                'vat' => 'BE001161223355',
                'street_name' => 'Rue Belliard ',
                'street_number' => "18",
                'zip_code' => 1000,
                'locality' => 'Brussels',
                'email' => 'company@pizzafolia.com',
                'company_type' => 'client',
                'active' => 1, 
            ],

            [
                'name'=> 'Caneva Entreprise',        
                'vat' => 'BE990457845787',
                'street_name' => 'Rue Justinien',
                'street_number' => "5",
                'zip_code' => 1050,
                'locality' => 'Ixelle',
                'email' => 'company@caneva.com',
                'company_type' => 'client',
                'active' => 1, 
            ],
      
            [
                'name'=> 'Villa Thai One',        
                'vat' => 'BE78122893355',
                'street_name' => 'Rue de Livourne',
                'street_number' => "148",
                'zip_code' => 1000,
                'locality' => 'Brussels',
                'email' => 'company@villathaile.com',
                'company_type' => 'client',
                'active' => 1, 
            ],

            [
                'name'=> 'KPR Phone',        
                'vat' => 'BE007874694',
                'street_name' => 'Rue Belliard ',
                'street_number' => "8",
                'zip_code' => 1000,
                'locality' => 'Brussels',
                'email' => 'company@pkprphone.com',
                'company_type' => 'client',
                'active' => 1, 
            ],


            /**
             *  Start Seeding Provider 
             */

            [
                'name'=> 'OVH Entreprise',        
                'vat' => 'FR007874694',
                'street_name' => 'Rue BKellerlman',
                'street_number' => "885",
                'zip_code' => 5400,
                'locality' => 'Paris',
                'email' => 'company@ovh.com',
                'company_type' => 'provider',
                'active' => 1, 
            ],

            [
                'name'=> 'Namecheamp',        
                'vat' => 'EN007874694',
                'street_name' => 'Rue du triomphe',
                'street_number' => "885",
                'zip_code' => 5400,
                'locality' => 'Paris',
                'email' => 'company@namecheap.com',
                'company_type' => 'provider',
                'active' => 1, 
            ],

            [
                'name'=> 'Google Entreprise',        
                'vat' => 'BE004545787',
                'street_name' => 'Rue Justinien',
                'street_number' => "85",
                'zip_code' => 5400,
                'locality' => 'Paris',
                'email' => 'company@googla.com',
                'company_type' => 'provider',
                'active' => 1, 
            ],

            [
                'name'=> 'USS Entreprise',        
                'vat' => 'BE0894545787',
                'street_name' => 'Boulevard Sisko',
                'street_number' => "85",
                'zip_code' => 5400,
                'locality' => 'Paris',
                'email' => 'company@starttreck.com',
                'company_type' => 'provider',
                'active' => 1, 
            ],
          
        ];


        foreach($seederDatas as $data){
            DB::table('companies')->insert([
                'name' => $data['name'],
                'vat' => $data['vat'],
                'street_name' => $data['street_name'],
                'street_number' => $data['street_number'],
                'zip_code' => $data['zip_code'],
                'locality' => $data['locality'],
                'email' => $data['email'],
                'company_type' => $data['company_type'],
                'active' => $data['active'],  
            ]);
        }
    }
}
