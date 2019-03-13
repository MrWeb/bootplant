<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'branch_id' => 1,
            'name'      => 'Andrea Lombardi',
            'email'     => 'lombardi.nd@gmail.com',
            'password'  => Hash::make('apple1907'),
        ]);
        $user->assignRole('superadmin');

        $user = User::create([
            'branch_id' => 1,
            'name'      => 'Alonso',
            'email'     => 'alonso@khs.it',
            'password'  => Hash::make('alonso'),
        ]);
        $user->assignRole('superadmin');

        $user = User::create([
            'branch_id' => 1,
            'name'      => 'Riccardo',
            'email'     => 'riccardo@khs.it',
            'password'  => Hash::make('riccardo'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'branch_id' => 1,
            'name'      => 'Agente',
            'email'     => 'agente@khs.it',
            'password'  => Hash::make('agente'),
        ]);
        $user->assignRole('agente');
    }
}
