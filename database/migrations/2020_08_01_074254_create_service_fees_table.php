<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('assessment_service_id')->constrained()->onDelete('cascade');
            $table->string('code')->nullable();
            $table->string('name_fees');
            $table->float('surcharge_amount', 8,2)->nullable();
            $table->float('amount', 8,2);
            $table->float('total', 8,2);
            $table->boolean('enabled_year_computation')->default(0);
            $table->boolean('enabled_surcharge')->default(0);
            $table->boolean('enabled_suf_surcharge')->default(0);
            $table->boolean('enabled_portable_computation')->default(0);
            $table->boolean('enabled_dst_default')->default(0); //QTY DST => 1
            $table->boolean('enabled_licensed_fee_computation')->default(0); //QTY DST => 1
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
        Schema::dropIfExists('service_fees');
    }
}
