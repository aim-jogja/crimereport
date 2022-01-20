<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimereportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crimereports', function (Blueprint $table) {
            $table->id('CaseID');
            $table->string('casetype');
            $table->date('date_case')->nullable();
            $table->string('picture')->nullable();
            $table->text('description')->nullable();
            $table->string('police_desc')->nullable();
            $table->string('location')->nullable();
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
        Schema::dropIfExists('crimereports');
    }
}
