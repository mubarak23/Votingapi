<?php

use Illuminate\Database\Seeder;
use App\President;


class PresidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $president = New president();
        $president->all_student_id = 2;
        $president->position = "president";
        $president->vote_count = 0;

        $president = New president();
        $president->all_student_id = 1;
        $president->position = "president";
        $president->vote_count = 0;
    }
}
