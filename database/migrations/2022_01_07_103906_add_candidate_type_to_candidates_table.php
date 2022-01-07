<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCandidateTypeToCandidatesTable extends Migration
{
    
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->enum('candidate_type',['BEM','BPM','HIMA'])->after('candidate_number');
        });
    }
    
    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {
            //
        });
    }
}
