<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensingProcessingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licensing_processings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('processor_licensing_id')->default(0);
            $table->string('date_of_distribution')->nullable();
            $table->string('applicant_company')->nullable();
            $table->string('or_date')->nullable();
            $table->string('or_number')->nullable();
            $table->string('license_filed')->nullable();
            $table->string('requirements')->nullable();
            $table->string('quantity')->nullable();
            $table->string('processor')->nullable(); //Optional
            $table->string('remarks')->nullable();  
            $table->string('date_processed')->nullable();  
            $table->string('date_releasing')->nullable();  
            $table->string('reason')->nullable();  
            $table->string('name_receiver')->nullable();  
            $table->string('date_receive')->nullable();  
            $table->binary('signature')->nullable();  
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
        Schema::dropIfExists('licensing_processings');
    }
}
