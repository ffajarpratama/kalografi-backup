<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotobookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photobooks')->insert([
           [
               'photobook' => 'Wedding Photobook 20cm x 30cm',
               'price' => 400000
           ]
        ]);
    }
}
