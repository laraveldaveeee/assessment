<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->integer('user_id')->default(0);
            $table->integer('user_accounting_id')->default(0);
            $table->string('soa_no')->nullable()->unique();
            $table->string('op_no')->nullable()->unique();
            $table->integer('applicant_id')->default(0);
            $table->integer('carrier_id')->default(0);
            $table->string('soa_number')->nullable();
            $table->string('class_station')->nullable();
            $table->string('remarks')->nullable();
            $table->string('due_date')->nullable();
            $table->datetime('date_validity')->nullable();
            $table->string('status')->nullable();
            $table->string('carrier_status')->nullable();
            $table->string('notes')->nullable();
            $table->string('noted')->nullable();
            $table->string('messages')->nullable();
            $table->string('or_no')->nullable();
            $table->date('or_date')->nullable();
            $table->time('time_update')->nullable();
            $table->time('accounting_time_update')->nullable();
            $table->date('order_payment_date')->nullable();
            $table->datetime('date_assessment')->nullable();
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
        Schema::dropIfExists('assessments');
    }
}
