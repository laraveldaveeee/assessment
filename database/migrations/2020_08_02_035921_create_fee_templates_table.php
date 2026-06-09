<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('service_template_id')->constrained()->onDelete('cascade');
            $table->string('code')->nullable();
            $table->string('name_fees');
            $table->float('amount', 8,2);
            $table->boolean('enabled_year_computation')->default(1);
            $table->boolean('enabled_surcharge')->default(0);
            $table->boolean('enabled_portable_computation')->default(0);
            $table->boolean('enabled_dst_default')->default(0); //Enabled DST QTY => 1
            $table->boolean('enabled_licensed_fee_computation')->default(0); //Enabled DST QTY => 1
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
        Schema::dropIfExists('fee_templates');
    }
}
