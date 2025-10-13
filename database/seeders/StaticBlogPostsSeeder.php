<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StaticBlogPostsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $publishedDate = '2024-02-28 00:00:00';

        // Trouver ou créer la catégorie Laravel
        $category = Category::firstOrCreate(
            ['slug' => 'laravel'],
            ['name' => 'Laravel', 'description' => 'Articles sur le framework Laravel']
        );

        // Article 1 : Découverte de Laravel 10
        Post::updateOrCreate(
            ['slug' => 'decouverte-laravel-10'],
            [
                'title' => 'Découverte de Laravel 10',
                'body' => '<p>Laravel est un framework PHP open-source populaire qui facilite le développement d\'applications web robustes et élégantes.</p>
                <p>Laravel 10 apporte de nombreuses améliorations et nouvelles fonctionnalités qui rendent le développement encore plus agréable et productif.</p>
                <h2>Les nouveautés de Laravel 10</h2>
                <ul>
                    <li>Support PHP 8.1 minimum</li>
                    <li>Amélioration des performances</li>
                    <li>Nouvelles fonctionnalités de validation</li>
                    <li>Meilleure gestion des processus</li>
                </ul>
                <p>Laravel continue d\'être un choix excellent pour le développement d\'applications web modernes.</p>',
                'excerpt' => 'Laravel est un framework PHP open-source populaire qui facilite le développement d\'applications web robustes et élégantes.',
                'category_id' => $category->id,
                'featured_image' => 'assets/images/téléchargement.png',
                'status' => 'published',
                'is_pinned' => true,
                'published_at' => $publishedDate,
            ]
        );

        // Article 2 : API avec Laravel 10
        Post::updateOrCreate(
            ['slug' => 'blog-laravel-10-api'],
            [
                'title' => 'API avec Laravel 10 : application au projet e-shop',
                'body' => '<p>Les APIs (Application Programming Interfaces) sont des interfaces qui permettent à deux applications de communiquer entre elles.</p>
                <p>Dans ce tutoriel, nous allons explorer comment créer une API RESTful avec Laravel 10 pour un projet e-commerce.</p>
                <h2>Pourquoi utiliser une API ?</h2>
                <ul>
                    <li>Séparation du frontend et du backend</li>
                    <li>Réutilisation du code</li>
                    <li>Support de multiples clients (web, mobile, etc.)</li>
                    <li>Meilleure scalabilité</li>
                </ul>
                <h2>Création de notre API e-shop</h2>
                <p>Nous allons créer des endpoints pour gérer les produits, les catégories, et les commandes de notre boutique en ligne.</p>',
                'excerpt' => 'Les APIs (Application Programming Interfaces) sont des interfaces qui permettent à deux applications de communiquer entre elles.',
                'category_id' => $category->id,
                'featured_image' => 'assets/images/api.jpeg',
                'status' => 'published',
                'is_pinned' => true, // Épinglé pour rester en haut
                'published_at' => $publishedDate,
            ]
        );

        // Article 3 : Connection React à l'API Laravel
        Post::updateOrCreate(
            ['slug' => 'blog-laravel-10-api-react'],
            [
                'title' => 'Connection d\'une app React.js à notre API Laravel (cadre du projet e-shop)',
                'body' => '<p>ReactJS est une bibliothèque JavaScript open-source pour créer des interfaces utilisateur interactives. Elle est devenue l\'une des technologies frontend les plus populaires.</p>
                <p>Dans ce tutoriel, nous allons connecter notre application React à l\'API Laravel que nous avons créée précédemment.</p>
                <h2>Configuration de React</h2>
                <p>Nous allons utiliser Axios pour effectuer les requêtes HTTP vers notre API Laravel.</p>
                <h2>Gestion de l\'authentification</h2>
                <p>Laravel Sanctum sera utilisé pour sécuriser notre API et gérer l\'authentification des utilisateurs.</p>
                <h2>Affichage des produits</h2>
                <p>Nous allons créer des composants React pour afficher la liste des produits, les détails d\'un produit, et gérer le panier d\'achat.</p>',
                'excerpt' => 'ReactJS est une bibliothèque JavaScript open-source pour créer des interfaces utilisateur interactives. Elle est devenue l\'une des technologies frontend les plus populaires.',
                'category_id' => $category->id,
                'featured_image' => 'assets/images/react.png',
                'status' => 'published',
                'is_pinned' => true, // Épinglé pour rester en haut
                'published_at' => $publishedDate,
            ]
        );

        $this->command->info('3 articles statiques ont été créés/mis à jour avec succès !');
        $this->command->info('Ces articles sont épinglés et apparaîtront toujours en haut de la liste.');
    }
}
