<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Get the current date and time in PST
        $currentDate = now()->setTimezone('America/Los_Angeles');

        // Fetch all articles with the user's first_name and last_name
        $articles = Article::with('user:id,first_name,last_name,email')
            ->where('start_date', '<=', $currentDate)
            ->where('end_date', '>=', $currentDate)->get();

        return $articles;
    }

    public function posts(string $user_id)
    {
        $user = User::findOrFail($user_id);
        $contributor_username = $user->email;

        // Fetch articles where the current date is within the start_date and end_date range
        $articles = Article::with('user:id,first_name,last_name,email') // Eager load user's first and last name
            ->where('contributor_username', $contributor_username)
            ->latest('created_at')
            ->get();

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

        // Automatically set the contributor_username to the authenticated user's email
        $validated['contributor_username'] = Auth::user()->email;

        Article::create($validated);

        return redirect()->route('posts.index')->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::with('user:id,first_name,last_name,email')->findOrFail($id); // Retrieve the article with user details
        return view('article.show', compact('article')); // Pass the article to the view
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
