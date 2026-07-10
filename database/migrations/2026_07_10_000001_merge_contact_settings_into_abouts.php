<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->text('cta_text')->nullable()->after('github');
        });

        // Migrate data from contact_settings to abouts
        $contact = DB::table('contact_settings')->first();
        if ($contact) {
            DB::table('abouts')->where('id', 1)->update([
                'cta_text' => $contact->cta_text,
            ]);
        }

        // Drop contact_settings table
        Schema::dropIfExists('contact_settings');
    }

    public function down(): void
    {
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('github')->nullable();
            $table->text('cta_text')->nullable();
            $table->timestamps();
        });

        // Migrate data back
        $about = DB::table('abouts')->first();
        if ($about) {
            DB::table('contact_settings')->insert([
                'email' => $about->email,
                'whatsapp' => $about->whatsapp,
                'linkedin' => $about->linkedin,
                'instagram' => $about->instagram,
                'github' => $about->github,
                'cta_text' => $about->cta_text,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn('cta_text');
        });
    }
};
