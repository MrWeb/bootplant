<?php

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
        DB::table('branches')->insert([
            'id'       => 1,
            'name'     => 'KHS Italia',
            'address'  => 'Via Felice Matteucci, 25',
            'zip'      => '20862',
            'city'     => "Arcore",
            'phone'    => '039/616035',
            'district' => 'MB',
            'email'    => 'infokhsitalia@know-howsystems.com',
        ]);
    }
}
