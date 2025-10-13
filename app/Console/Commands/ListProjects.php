<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;

class ListProjects extends Command
{
    protected $signature = 'projects:list';
    protected $description = 'Liste tous les projets avec leurs détails';

    public function handle()
    {
        $this->info('=== TOUS LES PROJETS ===');
        $this->newLine();

        $projects = Project::orderBy('order')->orderBy('created_at', 'desc')->get();

        $this->info('Total: ' . $projects->count() . ' projets');
        $this->newLine();

        foreach ($projects as $project) {
            $featured = $project->is_featured ? '⭐ FEATURED' : '📄 Normal';

            $this->line("ID: {$project->id} | {$featured}");
            $this->line("   Titre: {$project->title}");
            $this->line("   Type: {$project->type}");
            $this->line("   Ordre: {$project->order}");
            $this->line("   Créé le: {$project->created_at->format('Y-m-d H:i')}");
            $this->newLine();
        }

        $this->newLine();
        $this->info('=== PROJETS PAR TYPE ===');
        $this->newLine();

        $types = Project::select('type')->distinct()->pluck('type');
        foreach ($types as $type) {
            $count = Project::where('type', $type)->count();
            $this->line("• {$type}: {$count} projet(s)");
        }

        $this->newLine();
        $this->info('=== PROJETS FEATURED (comme affichés sur le site) ===');
        $this->newLine();

        $featuredProjects = Project::where('is_featured', true)->ordered()->get();
        $this->info('Total featured: ' . $featuredProjects->count() . ' projets');
        $this->newLine();

        foreach ($featuredProjects as $index => $project) {
            $num = $index + 1;
            $featured = $project->is_featured ? '⭐' : '📄';
            $this->line("{$num}. {$featured} {$project->title} (type: {$project->type}, ordre: {$project->order})");
        }

        return 0;
    }
}
