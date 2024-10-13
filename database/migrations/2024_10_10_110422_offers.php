<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\BlueprintState;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('Title_offer');
            $table->string('Company_name');
            $table->string('Location');
            $table->foreignId('Employement_type_id');
            // $table->enum('Employement_type', ['CDI', 'CDD', 'ALTERNANCE']);
            $table->string('Salary_range');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->dropIfExists('offers');
        });
    }
};
