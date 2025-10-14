<?php

use Illuminate\Support\Facades\DB;
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
        // Ajouter les paramètres About Me
        $aboutSettings = [
            [
                'key' => 'about_me_title',
                'value' => 'About me',
                'group' => 'about',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'about_me_description',
                'value' => "Je suis un développeur web fullstack passionné par l'architecture backend, le machine learning et la modélisation de bases de données. Basé à Yaoundé, Cameroun,\nJ'excelle dans la conception de solutions web qui offrent une expérience utilisateur fluide, tout en priorisant la performance et l'évolutivité. Ma force réside dans la transformation de défis techniques complexes en applications intuitives et conviviales.",
                'group' => 'about',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'about_me_additional',
                'value' => "Modélisation de bases de données: Compétence en modélisation conceptuelle, normalisation et optimisation de schémas pour les bases de données SQL.",
                'group' => 'about',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'services_section_title',
                'value' => 'Ce que je fais',
                'group' => 'about',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('site_settings')->insert($aboutSettings);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('site_settings')->whereIn('key', [
            'about_me_title',
            'about_me_description',
            'about_me_additional',
            'services_section_title'
        ])->delete();
    }
};
