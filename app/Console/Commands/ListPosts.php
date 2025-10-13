<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class ListPosts extends Command
{
    protected $signature = 'posts:list';
    protected $description = 'Liste tous les articles de blog';

    public function handle()
    {
        $this->info('=== TOUS LES ARTICLES ===');
        $this->newLine();

        $posts = Post::orderBy('created_at', 'desc')->get();

        if ($posts->isEmpty()) {
            $this->warn('Aucun article trouvé dans la base de données.');
            return;
        }

        $this->info('Total: ' . $posts->count() . ' articles');
        $this->newLine();

        foreach ($posts as $post) {
            $pinned = $post->is_pinned ? '📌 ÉPINGLÉ' : '📄 Normal';
            $status = $post->status === 'published' ? '✅ Publié' : '📝 Brouillon';
            $pubDate = $post->published_at ? $post->published_at->format('Y-m-d H:i') : 'Non définie';

            $this->line("ID: {$post->id} | {$pinned} | {$status}");
            $this->line("   Titre: {$post->title}");
            $this->line("   Slug: {$post->slug}");
            $this->line("   Date pub: {$pubDate}");
            $this->line("   Créé le: {$post->created_at->format('Y-m-d H:i')}");
            $this->newLine();
        }

        $this->newLine();
        $this->info('=== ARTICLES PUBLIÉS (comme affichés sur le site) ===');
        $this->newLine();

        $publishedPosts = Post::published()->get();

        if ($publishedPosts->isEmpty()) {
            $this->warn('Aucun article publié trouvé.');
            return;
        }

        $this->info('Total publié: ' . $publishedPosts->count() . ' articles');
        $this->newLine();

        foreach ($publishedPosts as $index => $post) {
            $pinned = $post->is_pinned ? '📌' : '📄';
            $this->line(($index + 1) . ". {$pinned} {$post->title} (publié le: {$post->published_at->format('Y-m-d H:i')})");
        }
    }
}
