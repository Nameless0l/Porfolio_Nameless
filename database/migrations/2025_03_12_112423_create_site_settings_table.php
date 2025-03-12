<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->timestamps();
        });

        // Insérer les paramètres par défaut
        $settings = [
            // Informations personnelles
            ['key' => 'site_name', 'value' => 'Portfolio de Mbassi Loic Aron', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Développeur Web Full Stack', 'group' => 'general'],
            ['key' => 'owner_name', 'value' => 'Mbassi Loic Aron', 'group' => 'personal'],
            ['key' => 'owner_title', 'value' => 'Développeur Web Full Stack', 'group' => 'personal'],
            ['key' => 'owner_email', 'value' => 'wwwmbassiloic@gmail.com', 'group' => 'personal'],
            ['key' => 'owner_phone', 'value' => '+237 656820591', 'group' => 'personal'],
            ['key' => 'owner_location', 'value' => 'Cradat, Yaoundé, Cameroun', 'group' => 'personal'],
            ['key' => 'owner_birthday', 'value' => 'October 09, 2001', 'group' => 'personal'],

            // Réseaux sociaux
            ['key' => 'github_url', 'value' => 'https://github.com/Nameless0l', 'group' => 'social'],
            ['key' => 'linkedin_url', 'value' => 'https://www.linkedin.com/in/mbassi-loic-3942a9246', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/MbassiLoic/', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => 'https://www.instagram.com/mbassiloicaron/', 'group' => 'social'],
            ['key' => 'whatsapp_url', 'value' => 'https://wa.me/656820591', 'group' => 'social'],

            // SEO
            ['key' => 'meta_keywords', 'value' => 'Cameroun,ENSPY,Intelligence Artificielle,full,full stack,full-stack,fullstack,développeur web,portfolio,Laravel,PHP', 'group' => 'seo'],
            ['key' => 'meta_author', 'value' => 'Mbassi Ewolo Loic Aron', 'group' => 'seo'],
            ['key' => 'google_analytics_id', 'value' => '', 'group' => 'seo'],
        ];

        DB::table('site_settings')->insert($settings);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
