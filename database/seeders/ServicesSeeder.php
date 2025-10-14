<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Développement Backend',
                'description' => 'Maîtrise des langages backend Python, PHP. Je conçois des environnements côté serveur robustes et efficaces, des APIs robustes.',
                'icon' => 'assets/images/icon-design.svg',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Capacité Fullstack',
                'description' => 'Compétences front-end (ReactJS, NextJs) lorsque cela est nécessaire pour réaliser des projets web complets.',
                'icon' => 'assets/images/icon-dev.svg',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Machine Learning',
                'description' => "Expérimenté dans l'application d'algorithmes de ML (classification, régression) pour construire des fonctionnalités intelligentes et tirer des enseignements à partir des données.",
                'icon' => 'assets/images/icon-dev.svg',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        $this->command->info('Services créés avec succès!');
    }
}
