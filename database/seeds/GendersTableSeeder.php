<?php

use Illuminate\Database\Seeder;
use App\Gender;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = new Gender();
        $gender->gender_name = 'Male';
        $gender->save();
        $gender = new Gender();
        $gender->gender_name = 'Female';
        $gender->save();
    }
}
