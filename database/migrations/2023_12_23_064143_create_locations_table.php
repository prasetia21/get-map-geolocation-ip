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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->double('latitude1');
            $table->double('latitude2');
            $table->double('longitude1');
            $table->double('longitude2');
            $table->double('distance');
            $table->string('province_name');
            $table->string('city_name');
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
