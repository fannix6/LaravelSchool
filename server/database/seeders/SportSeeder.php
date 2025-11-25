<?php

namespace Database\Seeders;

use App\Helpers\CsvReader;
use App\Models\Sport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filename = 'csv/sports.csv';
        $delimiter = ';';
        $data = CsvReader::csvToArray($filename, $delimiter);
        Sport::factory()->createMany($data);
    }
}
