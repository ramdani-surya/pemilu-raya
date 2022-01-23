<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('period');
            $table->integer('total_voters')->nullable();
            $table->integer('voted_voters')->nullable();
            $table->integer('unvoted_voters')->nullable();
            $table->integer('total_candidates')->nullable();
            $table->integer('election_winner')->nullable()->comment('isi dengan candidate_number');
            $table->string('chairman')->nullable();
            $table->string('vice_chairman')->nullable();
            $table->string('chairman_photo')->nullable();
            $table->string('vice_chairman_photo')->nullable();
            $table->date('running_date')->nullable();
            $table->boolean('running')->default(0);
            $table->boolean('archived')->default(0);
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
        Schema::dropIfExists('elections');
    }
}
