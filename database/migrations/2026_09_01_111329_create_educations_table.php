<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('education', function (Blueprint $table) {
        $table->id();
        $table->string('institution');
        $table->string('degree')->nullable();
        $table->string('field_of_study')->nullable();
        $table->string('start_year', 4)->nullable();
        $table->string('end_year', 4)->nullable();
        $table->string('gpa')->nullable();
        $table->string('logo_text', 20)->nullable();
        $table->unsignedInteger('sort_order')->default(0);
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};