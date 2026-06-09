<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('assessment_id')->default(0);
            $table->integer('suff_rate_id')->default(0);
            $table->string('name')->nullable();
            $table->string('suf_name')->nullable();
            $table->string('qty')->nullable();
            $table->string('yr')->nullable();   
            $table->string('bandwidth')->nullable();
            $table->string('no_of_station')->nullable();
            $table->string('types')->nullable();
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
        Schema::dropIfExists('assessment_services');
    }
}
