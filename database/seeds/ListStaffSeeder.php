<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ListStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(0,5) as $i){
            DB::table('liststaff')->insert([
                'nama_staff' => $faker->name,
                'email_staff' => $faker->email,
                'jabatan_staff' => 'Staff',
                'unit_staff' => 'Locomotive Production',
                'no_telefon_staff' => $faker->e164PhoneNumber
            ]);
        }
    }
}
