<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::today();
        DB::table('pakets')->insert([
            [
                'namapaket' => 'Mahesa',
                'kategori' => 'Wedding Package',
                'workhours' => 8,
                'day' => 'Half Day',
                'photographers' => 2,
                'videographers' => 1,
                'flashdisk' => 1,
                'edited' => '300',
                'price' => 3500000,
                'idgaleri' => 1,
                'created_at' => date($today),
                'updated_at' => date($today)
            ],
            [
                'namapaket' => 'Manendra',
                'kategori' => 'Wedding Package',
                'workhours' => 15,
                'day' => 'Full Day',
                'photographers' => 2,
                'videographers' => 1,
                'flashdisk' => 1,
                'edited' => '500',
                'price' => 5500000,
                'idgaleri' => 2,
                'created_at' => date($today),
                'updated_at' => date($today)
            ],
            [
                'namapaket' => 'Mahawira',
                'kategori' => 'Wedding Package',
                'workhours' => 15,
                'day' => 'Full Day',
                'photographers' => 2,
                'videographers' => 2,
                'flashdisk' => 1,
                'edited' => 'all',
                'price' => 7500000,
                'idgaleri' => 3,
                'created_at' => date($today),
                'updated_at' => date($today)
            ],
            [
                'namapaket' => 'Renjana',
                'kategori' => 'Pre-Wedding Package',
                'workhours' => 2,
                'day' => '-',
                'photographers' => 1,
                'videographers' => 1,
                'flashdisk' => 1,
                'edited' => '300',
                'price' => 2000000,
                'idgaleri' => 4,
                'created_at' => date($today),
                'updated_at' => date($today)
            ],
            [
                'namapaket' => 'Sekala',
                'kategori' => 'Pre-Wedding Package',
                'workhours' => 2,
                'day' => '-',
                'photographers' => 2,
                'videographers' => 1,
                'flashdisk' => 1,
                'edited' => '125',
                'price' => 3000000,
                'idgaleri' => 5,
                'created_at' => date($today),
                'updated_at' => date($today)
            ],
            [
                'namapaket' => 'Asmaraloka',
                'kategori' => 'Pre-Wedding Package',
                'workhours' => 4,
                'day' => '-',
                'photographers' => 2,
                'videographers' => 1,
                'flashdisk' => 1,
                'edited' => '200',
                'price' => 4750000,
                'idgaleri' => 6,
                'created_at' => date($today),
                'updated_at' => date($today)
            ],
            [
                'namapaket' => 'Amerta',
                'kategori' => 'Engagement Package',
                'workhours' => 4,
                'day' => '-',
                'photographers' => 1,
                'videographers' => 0,
                'flashdisk' => 0,
                'edited' => '50',
                'price' => 1500000,
                'idgaleri' => 7,
                'created_at' => date($today),
                'updated_at' => date($today)
            ],
            [
                'namapaket' => 'Arunika',
                'kategori' => 'Engagement Package',
                'workhours' => 6,
                'day' => '-',
                'photographers' => 1,
                'videographers' => 1,
                'flashdisk' => 0,
                'edited' => '100',
                'price' => 2750000,
                'idgaleri' => 8,
                'created_at' => date($today),
                'updated_at' => date($today)
            ],
        ]);
    }
}
