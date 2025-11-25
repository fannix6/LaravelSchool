<?php

namespace Database\Seeders;

use App\Models\Schoolclass;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //egy osztalyba atleg 28 tanulo jar
        $avgClassSize = 28;
        //osszesen hany osztalyunk van
        $numberOfClasses = Schoolclass::count();
        //akkor hany tanulonk legyen
        $numberOfStudent = $avgClassSize * $numberOfClasses;
        Student::factory()->count($numberOfStudent);
    }
}
