<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("companies")->delete();

        $companies= [
            ["name" => "ACM Gold", "website"=>"https://www.acmgold.com/"],
            ["name" => "Aimviz", "website"=>"https://www.aimviz.com"],
            ["name" => "Invision Solutions", "website"=>"https://www.invisionsolutions.ca"],
            ["name" => "Digihive", "Website"=>"https://www.digihive.com"],
            ["name" => "PNC Solutions", "website"=>"https://www.pncdigital.com/"],
        ];

        \App\Company::insert($companies);
    }
}
