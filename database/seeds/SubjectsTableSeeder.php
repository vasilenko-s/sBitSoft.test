<?php

use Illuminate\Database\Seeder;
use App\Subject;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
                        'name'=>'Chemistry'
                         ]);
        Subject::create([
                        'name'=>'Biology'
                         ]);
        Subject::create([
                        'name'=>'Phisics'
                         ]);
        Subject::create([
                        'name'=>'Math'
                        ]);
        Subject::create([
                        'name'=>'Geography'
                        ]);
    }
}
