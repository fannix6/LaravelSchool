<?php

namespace Database\Factories;

use App\Models\Schoolclass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected function withFaker()
    {
        // Manuális beállítás az app config felülírására
        return \Faker\Factory::create('hu_HU');
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    function kalkulalOsztöndijTömbbel(float $atlag): int
    {
        $osztondijTabla = [
            2.0 => 8000,
            2.5 => 16000,
            3.5 => 25000,
            4.5 => 42000,
            // Az 59000-et a ciklus utáni alapértelmezett érték garantálja.
        ];
 
        foreach ($osztondijTabla as $hatar => $osszeg) {
            if ($atlag < $hatar) {
                return $osszeg;
            }
        }
        return 59000;
    }

    public function definition(): array
    {
        //neme
        $neme = $this->faker->boolean;
        $gender = $neme ? 'male' : 'female';

        //neve
        $firstName = $this->faker->firstName($gender);
        $lastName = $this->faker->lastName($gender);
        $diakNev = "$firstName $lastName";

        //adatok
        $iranyitoszam = $this->faker->postcode;
        $lakHelyseg = $this->faker->city;
        $szulHelyseg = $this->faker->city;
        $lakCim = $this->faker->streetAddress;
        $igazolvanyszam = strtoupper($this->faker->bothify('??######'));
        
        //osztaly
        $atlag = $this->faker->randomFloat($nbMaxDecimals = 1, $min = 1, $max = 5);
        $randomClass = Schoolclass::inRandomOrder()->first();
        $schoolclassId = $randomClass->id;
        $osztondij = 20000;

        
        $grade =(int) substr($randomClass->osztalyNev, 0, 1);
        $ageMin = $grade+5;
        $ageMax = $grade+6;
        $szulDatum = $this->faker->dateTimeBetween(($ageMax). ' years', ($ageMin). ' years');
        
        return [
            'diakNev' => $diakNev,
            'schoolclassId' => $schoolclassId,
            'neme' => $neme,
            'iranyitoszam' => $iranyitoszam,
            'lakHelyseg' => $lakHelyseg,
            'lakCim' => $lakCim,
            'szulHelyseg' => $szulHelyseg,
            'szulDatum' => $szulDatum,
            'igazolvanyszam' => $igazolvanyszam,
            'atlag' => $atlag,
            'osztondij' => $osztondij,


        ];
    }
}
