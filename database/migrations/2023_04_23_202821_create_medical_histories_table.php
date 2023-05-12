<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->string('MedicalNumber')->unique();
            $table->date('AdmissionDate');
            $table->time('AdmissionTime');
            $table->string('Professional');
            $table->bigInteger('ProfessionalDocument');
            $table->string('Proprietary');
            $table->string('ProprietaryAddress');
            $table->string('ProprietaryDocument');
            $table->string('ProprietaryPhoneNumber');
            $table->string('PatientName');
            $table->string('Location');
            $table->string('Department');
            $table->string('City');
            $table->string('Species');
            $table->string('Race');
            $table->string('Sex');
            $table->string('Age');
            $table->string('Color');
            $table->string('Weight');
            $table->string('ReasonConsultation');
            $table->string('ReproductiveStatus');
            $table->string('VaccinesVermifugesBaths');
            $table->string('Diet');
            $table->longText('Ananmnesis');
            $table->string('GeneralCondition');
            $table->longText('Anormalities');
            $table->string('Photo')->nullable();
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
        Schema::dropIfExists('medical_histories');
    }
}
