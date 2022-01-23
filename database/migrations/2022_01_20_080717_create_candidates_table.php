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
            $table->foreignId('election_id')->constrained();
            $table->foreignId('candidate_type_id')->constrained();
            $table->integer('candidate_number');
            $table->string('chairman_name');
            $table->string('vice_chairman_name')->nullable();
            $table->string('image')->nullable();
            $table->text('program')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->string('faculty')->nullable();
            $table->string('study_program')->nullable();
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
