<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    // View Controlers

    // Home
    public function home()
    {
        $articles = Article::all();
        return view('home', compact('articles'));
    }

    // List of articles
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    // Display selected article
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('articles.show', compact('article'));
    }

    // Edit selected article
    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('articles.edit', compact('article'));
    }

    // Form for creating new article
    public function create()
    {
        return view('articles.create');
    }

    // Database controllers

    // New article
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $article = new Article();
        $article->title = $validatedData['title'];
        $article->content = $validatedData['content'];
        $article->slug = Str::slug($validatedData['title'], '-');
        $article->save();

        return redirect('/')->with('success', 'Article Created Successfully');
    }

    // Update article in db
    public function update(Request $request, $slug)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $article = Article::where('slug', $slug)->firstOrFail();
        $article->title = $validatedData['title'];
        $article->content = $validatedData['content'];
        $article->slug = Str::slug($validatedData['title'], '-');
        $article->save();

        return redirect('/')->with('success', 'Article Updated Successfully');
    }

    // Delete article
    public function destroy($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $article->delete();

        return response()->json(['success' => 'Article Deleted Successfully']);
    }
}
