<?php

namespace App\Console\Commands;

use App\Models\Service;
use Illuminate\Console\Command;

class ListServices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'services:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Liste tous les services configurés';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $services = Service::ordered()->get();

        if ($services->isEmpty()) {
            $this->error('Aucun service trouvé dans la base de données.');
            return 1;
        }

        $this->info('📋 LISTE DES SERVICES');
        $this->info('======================');
        $this->newLine();

        foreach ($services as $service) {
            $this->info("#{$service->id} - {$service->title}");
            $this->line("   Description: {$service->description}");
            $this->line("   Icône: " . ($service->icon ?: '(aucune)'));
            $this->line("   Ordre: {$service->order}");
            $this->line("   Statut: " . ($service->is_active ? '✅ Actif' : '❌ Inactif'));
            $this->line("   Créé: {$service->created_at->format('d/m/Y H:i')}");
            $this->newLine();
        }

        $activeCount = $services->where('is_active', true)->count();
        $this->info("Total: {$services->count()} services ({$activeCount} actifs)");

        return 0;
    }
}
