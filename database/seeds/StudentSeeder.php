<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $student  = New Student();
        $student->full_name = "Mubarak Aminu";
        $student->reg_no = "Eng/11/com/00234";
        $student->programme = "Computer Engieering";
        $student->level= "400";
        $student->is_candidate = 0;
        $student->save();

        $student  = New Student();
        $student->full_name = "Nana Fatimah Sadiq";
        $student->reg_no = "Sms/15/com/00132";
        $student->programme = "Mass Communication";
        $student->level= "300";
        $student->is_candidate = 0;
        $student->save();

        $student  = New Student();
        $student->full_name = "Halimat Sadiyah Hassan";
        $student->reg_no = "SMS/15/IRS/00245";
        $student->programme = "International Relation";
        $student->level= "300";
        $student->is_candidate = 0;
        $student->save();
    }
}
