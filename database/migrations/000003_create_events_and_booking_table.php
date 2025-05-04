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
        Schema::create('events', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->string('artist');
            $table->string('location');
            $table->text('description');
			$table->dateTime('start', precision: 0);
			$table->dateTime('stop', precision: 0);
            $table->smallInteger('seats');
			$table->smallInteger('sold')->default(0);
            $table->timestamps();
        });
		
        Schema::create('bookings', function (Blueprint $table) {
            $table->id()->primary();
			$table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('event_id')->references('id')->on('events');			
			$table->smallInteger('seats');
            $table->timestamps();
        });		
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('bookings');

    }
};
