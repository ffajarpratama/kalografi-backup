<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrintedPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('printedphotos')->insert([
            [
                'printedphoto' => 'Printed Photo 16R On Canvas + Frame',
                'price' => 300000
            ]
        ]);
    }
}
