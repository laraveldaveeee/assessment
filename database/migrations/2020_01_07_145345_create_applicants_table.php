<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('applicant_company');
            $table->string('address')->nullable();
            $table->string('due_date');
            $table->text('notes');
            $table->string('assess_date');
            $table->timestamps();
        });

           // \DB::statement("ALTER TABLE applicants AUTO_INCREMENT = 000001 ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
