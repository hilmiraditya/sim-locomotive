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
                'nama' => $faker->name,
                'email' => $faker->email,
                'jabatan' => 'Staff',
                'unit' => 'Locomotive Production',
                'no_telefon' => $faker->e164PhoneNumber
            ]);
        }
    }
}
