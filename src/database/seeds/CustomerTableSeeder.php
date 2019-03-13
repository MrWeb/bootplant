<?php
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('it_IT');
        for ($i = 0; $i < 20; $i++) {
            DB::table('registries')->insert([
                'branch_id' => 1,
                'user_id'   => $faker->randomElement([1, 2, 3, 4]),
                'id'        => Uuid::generate()->string,
                'fname'     => $faker->firstName,
                'lname'     => $faker->lastName,
                'phone'     => $faker->PhoneNumber,
                'phone'     => $faker->PhoneNumber,
                'CF'        => $faker->taxId(),
                'address'   => $faker->streetName,
                'city'      => $faker->city,
                'zip'       => $faker->postcode,
                'PIVA'      => $faker->vatId(),
                'company'   => $faker->company,
                'district'  => $faker->stateAbbr,
                'email'     => $faker->email,
                'kind'      => $faker->randomElement(['agent', 'customer', 'autoshop', 'insurance']),
            ]);
        }
        return true;
    }
}
