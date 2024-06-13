<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PemasukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("id_ID");

        for ($i = 1; $i <= 10; $i++) {
            DB::table('pemasukan')->insert([
                'tanggal' => $faker->date(),
                'jumlah' => $faker->numberBetween(10,2),
                'keterangan' => $faker->sentence(),
            ]);
        }
    }
}
