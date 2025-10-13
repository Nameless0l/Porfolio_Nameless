<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'excerpt' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'is_pinned' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
            'published_at' => 'nullable|date',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->category_id = $request->category_id;
        $post->status = $request->status;
        $post->is_pinned = $request->has('is_pinned') ? (bool)$request->is_pinned : false;
        $post->order = $request->input('order', 0);

        // Handle published_at date
        if ($request->status == 'published') {
            $post->published_at = $request->published_at ?? now();
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('posts', 'public');
            $post->featured_image = $imagePath;
        }

        $post->save();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'excerpt' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'is_pinned' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
            'published_at' => 'nullable|date',
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->category_id = $request->category_id;
        $post->status = $request->status;
        $post->is_pinned = $request->has('is_pinned') ? (bool)$request->is_pinned : false;
        $post->order = $request->input('order', 0);

        // Handle published_at date
        if ($request->status == 'published' && !$post->published_at) {
            $post->published_at = $request->published_at ?? now();
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }

            $imagePath = $request->file('featured_image')->store('posts', 'public');
            $post->featured_image = $imagePath;
        }

        $post->save();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete featured image if exists
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted successfully.');
    }

    /**
     * Display the public blog index.
     */
    public function blogIndex()
    {
        $posts = Post::published()->paginate(9);

        // Solution universelle
        $categories = Category::withCount(['posts' => function ($query) {
            $query->where('status', 'published');
        }])->ordered()->get();

        // Filtrer en PHP plutôt qu'avec HAVING
        $categoriesWithPosts = $categories->filter(function ($category) {
            return $category->posts_count > 0;
        });

        return view('blog.index', compact('posts', 'categoriesWithPosts'));
    }

    /**
     * Display a single blog post.
     */
    public function blogShow($slug)
    {
        $post = Post::where('slug', $slug)
                    ->where('status', 'published')
                    ->where('published_at', '<=', now())
                    ->firstOrFail();

        $relatedPosts = Post::where('category_id', $post->category_id)
                            ->where('id', '!=', $post->id)
                            ->published()
                            ->limit(3)
                            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
