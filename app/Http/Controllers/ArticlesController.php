<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        return view('articles.index', ['articles' => Article::latest('published_at')->published()->get()]);
    }

    public function show($id)
    {
        return view('articles.show', ['article' => Article::findOrFail($id)]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        Article::create($request->input());
        return redirect('articles');
    }
}
