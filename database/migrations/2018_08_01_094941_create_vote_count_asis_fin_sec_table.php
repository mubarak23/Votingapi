<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteCountAsisFinSecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_count_asis_fin_sec', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('students_id')->references('id')->on('students');
            $table->string('students_full_name')->references('full_name')->on('students');
            $table->integer('vote');
            $table->integer('candidate_id')->references('id')->on('asis_fin_secs');
            $table->string('candidate_fullname')->references('full_name')->on('students');
            $table->date('vote_time');
            $table->integer('vote_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_count_asis_fin_sec');
    }
}
