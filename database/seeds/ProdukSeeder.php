<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(0,30) as $i){
            DB::table('produk')->insert([
                'nama_produk' => $faker->name,
                'harga_produk' => $faker->randomNumber(2),
                'kuantitas_produk' => rand(1,10),
                'deskripsi_produk' => 'salah satu produk locomotive'
            ]);
        }
    }
}
