<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Article::all(); // Fetch all articles
        // echo(Auth::id());
        // $articles = Article::where('user_id', Auth::id())->latest('updated_at')->get();
        // return view("articles.index", ['articles' => $articles]);
    }

    public function posts(string $user_id)
    {
        $articles = Article::where('user_id', $user_id)->latest('updated_at')->get();
        return $articles;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'start_date' => 'required|date|after_or_equal:'.now()->setTimezone('America/Los_Angeles')->toDateTimeString(),
            'end_date' => 'required|date|after:start_date',
        ]);

        $validated['user_id'] = Auth::id();

        Article::create($validated);

        return redirect()->route('posts.index')->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id); // Retrieve the article or throw a 404 error
        return view('article.edit', compact('article')); // Pass the article to the view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'start_date' => 'required|date|after_or_equal:now',
            'end_date' => 'required|date|after:start_date',
        ]);

        $article = Article::findOrFail($id);
        $article->update($validated);

        return redirect()->route('posts.index')->with('success', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('posts.index')->with('success', 'Article deleted successfully!');
    }
}
