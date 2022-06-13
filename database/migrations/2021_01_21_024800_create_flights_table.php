<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('candidate_id', 200)->nullable();
            $table->string('contact_person', 200)->nullable();
            $table->text('contact_address')->nullable();
            $table->string('contact_number', 200)->nullable();
            $table->text('details')->nullable();
            $table->string('abroad_agency', 200)->nullable();
            $table->string('created_by', 200)->nullable();
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
        Schema::dropIfExists('flights');
    }
}
