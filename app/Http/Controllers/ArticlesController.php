<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index()
    {
        //return Auth::user();
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

    public function edit($id)
    {
        return view('articles.edit', ['article' => Article::findOrFail($id)]);
    }

    public function store(ArticleRequest $request)
    {
        Auth::user()->articles()->save(new Article($request->input()));
        return redirect('articles');
    }

    public function update($id, ArticleRequest $request)
    {
        Article::findOrFail($id)->update($request->input());
        return redirect('articles');
    }
}
