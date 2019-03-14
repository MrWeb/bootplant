<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('it_IT');
        DB::table('branches')->insert([
            'id'       => 1,
            'name'     => $faker->company,
            'address'  => $faker->streetName,
            'zip'      => $faker->postcode,
            'city'     => $faker->city,
            'phone'    => $faker->PhoneNumber,
            'district' => $faker->stateAbbr,
            'email'    => $faker->safeEmail,
            'website'  => $faker->domainName,
            'PIVA'     => $faker->vatId(),
            'CF'       => $faker->taxId(),
            'logo_img' => '1234.jpg',
        ]);
    }
}
