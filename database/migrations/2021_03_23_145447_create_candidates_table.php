<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->integer('candidate_number');
            $table->string('chairman_name');
            $table->string('vice_chairman_name');
            $table->string('chairman_photo')->nullable();
            $table->string('vice_chairman_photo')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
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
        Schema::dropIfExists('candidates');
    }
}
