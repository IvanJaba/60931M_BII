<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidate', function (Blueprint $table) {
            $table->id();
            $table->string('FIO');

        });

        Schema::create('polling_station', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_region')->references('id')->on('region');
            $table->unsignedInteger('station_number');
            $table->unsignedBigInteger('vote_number');

        });

        Schema::create('region', function (Blueprint $table) {
            $table->id();
            $table->string('name');

        });

        Schema::create('vote_results', function (Blueprint $table) {
            $table->foreign('id_polling_station')->references('id')->on('polling_station');
            $table->foreign('id_candidate')->references('id')->on('candidate');
            $table->integer('vote_number')->default(0);

        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate');
        Schema::dropIfExists('polling_station');
        Schema::dropIfExists('region');
        Schema::dropIfExists('vote_results');
    }
};
