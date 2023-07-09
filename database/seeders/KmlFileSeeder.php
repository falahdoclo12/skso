<?php

namespace Database\Seeders;

use App\Models\Kml;
use Illuminate\Database\Seeder;

class KmlFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kml::create([
            'name' => 'KML File 1',
            'file_path' => 'kml/file1.kml',
        ]);
    }
}
