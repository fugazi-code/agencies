<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('employer_id', 200)->nullable();
            $table->string('candidate_id', 200)->nullable();
            $table->string('created_by', 200)->nullable();
            $table->string('salary_received', 200)->nullable();
            $table->date('salary_date')->nullable();
            $table->text('comments')->nullable();
            $table->string('attachment_1', 200)->nullable();
            $table->string('attachment_2', 200)->nullable();
            $table->string('attachment_3', 200)->nullable();
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
        Schema::dropIfExists('reports');
    }
}
