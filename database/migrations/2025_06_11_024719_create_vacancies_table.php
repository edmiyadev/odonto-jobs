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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company_name');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('type_employment_id');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('type_employment_id')->references('id')->on('type_employments')->onDelete('cascade');
            $table->decimal('salary_min', 10, 2)->nullable();
            $table->decimal('salary_max', 10, 2)->nullable();
            $table->text('description');
            $table->text('requirements')->nullable();
            $table->text('benefits')->nullable();
            $table->enum('experience_level', ['sin experiencia', '1-2', '3-5', '5', '10'])->default('sin experiencia');
            $table->enum('educational_level', ['Bachillerato', 'Técnico', 'Especialidad', 'Maestría', 'Doctorado'])->default('Técnico');
            $table->string('company_email')->nullable();
            $table->string('company_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
