<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsisFinSecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asis_fin_secs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('students_id')->references('id')->on('students');
            $table->string('position');
            $table->integer('vote_count');
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
        Schema::dropIfExists('asis_fin_secs');
    }
}
