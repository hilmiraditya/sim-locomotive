<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = New User;
        $user->id = 1;
        $user->name = 'Hilmi Raditya';
        $user->email = 'admin@admin.com';
        $user->admin = 1;
        $user->password = bcrypt('password');
        $user->save();
    
        $user = New User;
        $user->id = 1;
        $user->name = 'Staff Hilmi';
        $user->email = 'staff@staff.com';
        $user->admin = 1;
        $user->password = bcrypt('password');
        $user->save();
    }
}
