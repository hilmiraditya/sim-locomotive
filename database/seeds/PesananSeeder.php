<?php

use Illuminate\Database\Seeder;
use App\Model\Pesanan;
use Faker\Factory as Faker;

class PesananSeeder extends Seeder
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
        	$pesanan = New Pesanan;
        	//biodata
        	$pesanan->nama_klien = $faker->name;
        	$pesanan->noidentitas_klien = rand(800000,10000000);
        	$pesanan->alamat_klien = $faker->address;
        	$pesanan->email_klien = $faker->email;
        	$pesanan->perusahaan_klien = $faker->name;
        	$pesanan->jabatan_klien = 'Manager';
       		$pesanan->notelp_klien = $faker->e164PhoneNumber;
        	$pesanan->nowhatsapp_klien = $faker->e164PhoneNumber;
        	$pesanan->instagram_klien = 'Percobaan';
        	//agenda produksi
        	$pesanan->deskripsi_agenda_produksi = 'ini adalah deskripsinya hehehehe';
        	//jadwal revisi dan serah terima
        	$pesanan->preview_pertama = $faker->date($format = 'Y-m-d', $max = 'now');
        	$pesanan->jadwal_1 = $faker->date($format = 'Y-m-d', $max = 'now');
        	$pesanan->jadwal_2 = $faker->date($format = 'Y-m-d', $max = 'now');
        	$pesanan->serah_terimah = $faker->date($format = 'Y-m-d', $max = 'now');
        	//catatan lain
        	$pesanan->catatan_lain = 'ini adalah catatan lainnya hehehehe';
        	//unit produksi
        	$pesanan->unit_produksi = 'Locomotive Production';
        	//total harga
        	$pesanan->total_harga = rand(800000,10000000);
        	//nama penginput
        	$pesanan->user_id = 1;
        	$pesanan->nama_penginput = 'Hilmi Raditya';

        	$pesanan->save();
        }
    }
}
