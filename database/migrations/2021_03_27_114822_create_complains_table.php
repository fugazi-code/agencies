<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->string('contact_person', 200)->nullable();
            $table->string('first_name', 200)->nullable();
            $table->string('middle_name', 200)->nullable();
            $table->string('last_name', 200)->nullable();
            $table->string('gender', 200)->nullable();
            $table->string('national_id', 200)->nullable();
            $table->string('occupation', 200)->nullable();
            $table->string('passport', 200)->nullable();
            $table->string('email_address', 200)->nullable();
            $table->string('contact_number', 200)->nullable();
            $table->string('contact_number2', 200)->nullable();
            $table->string('location_ksa', 200)->nullable();
            $table->string('employer_national_id', 200)->nullable();
            $table->string('employer_name', 200)->nullable();
            $table->string('employer_contact', 200)->nullable();
            $table->string('host_agency', 200)->nullable();
            $table->string('agency', 200)->nullable();
            $table->string('agency_id', 200)->nullable();
            $table->text('complain')->nullable();
            $table->string('actual_langitude', 200)->nullable();
            $table->string('actual_longitude', 200)->nullable();
            $table->string('image1', 200)->nullable();
            $table->string('image2', 200)->nullable();
            $table->string('image3', 200)->nullable();
            $table->text('remarks')->nullable();
            $table->string('status', 200)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('complains');
    }
}
