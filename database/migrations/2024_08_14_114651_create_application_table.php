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
        Schema::create('application', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('marital');
            $table->string('region', 255);
            $table->string('street', 255);
            $table->integer('age')->unsigned();
            $table->string('district', 255);
            $table->string('level', 255);
            $table->string('preference', 255);
            $table->string('nationality');
            $table->boolean('is_working');
            $table->boolean('has_traveled');
            $table->boolean('has_applied');
            $table->boolean('has_passport');
            $table->string('where_working')->nullable();
            $table->string('where_traveled')->nullable();
            $table->string('where_applied')->nullable();
            $table->string('passport')->nullable();
            $table->string('cv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application');
    }
};
