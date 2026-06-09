<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('app_fee')->nullable();
            $table->string('filing_fee')->nullable();
            $table->string('roc_fee')->nullable();
            $table->string('dst_fee')->nullable(); // Documentary Stamp Tax (/document)
            $table->string('examination_fee')->nullable();  //Amateur & Aircraft
            $table->string('seminar_fee')->nullable(); //SROP
            $table->string('duplicate_fee')->nullable();
            $table->string('license_fee')->nullable();
            $table->string('modification_fee')->nullable();
            $table->string('permit_possess_fee')->nullable();
            $table->string('purchase_permit_fee')->nullable(); //Unit
            $table->string('construction_permit_fee')->nullable();
            $table->string('possess_permit_fee')->nullable();
            $table->string('sell_transfer_fee')->nullable();
            $table->string('inspection_fee')->nullable();
            $table->string('registration_fee')->nullable();
            $table->string('spectrum_users_fee')->nullable();
            $table->string('permit_fee')->nullable();
            $table->string('import_permit_fee')->nullable();
            $table->string('certificate_of_exemption')->nullable(); //Opyional
            $table->string('release_clearance_two_units_below')->nullable(); //Opyional
            $table->string('release_clearance_three_units_below')->nullable(); //Opyional
            $table->string('administrative')->nullable(); //Opyional
            $table->string('all_permits_and_licenses')->nullable(); //Opyional
            $table->string('accreditation_fee')->nullable();
            // $table->string('high_power_reader')->nullable(); //Optional
            // $table->string('low_power_reader')->nullable(); //Opyional
            // $table->string('metro_manila')->nullable(); //Opyional
            // $table->string('highly_urbanized_cities')->nullable(); //Opyional
            // $table->string('all_other_areas')->nullable(); //Opyional
            // $table->string('registration_fee_first_five_services')->nullable(); //Opyional
            // $table->string('additional_service_registered')->nullable(); //Opyional
            $table->string('metro_manila')->nullable();
            $table->string('highly_urbanized_cities')->nullable();
            $table->string('all_other_areas')->nullable();
            $table->string('supervision_regulation_fees')->nullable(); //SRF
            $table->string('clearance_fee')->nullable(); 
            $table->string('certification_fee')->nullable(); 
            $table->string('cert_true_copy_fee')->nullable(); 
            $table->string('radio_station_license_fee')->nullable(); 
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
        Schema::dropIfExists('services');
    }
}
