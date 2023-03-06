<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
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
        return view('articles.index', ['articles' => Article::latest('published_at')->published()->get()]);
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create', ['tags' => Tag::pluck('name', 'id')]);
    }

    public function edit(Article $article)
    {
        $tags = Tag::pluck('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }

    public function store(ArticleRequest $request)
    {
        $this->createArticle($request);
        flash()->success('Your article has been created');
        return redirect('articles');
    }

    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->input());
        $article->tags()->sync($request->input('tags'));
        return redirect('articles');
    }

    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }

    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->save(new Article($request->input()));
        $this->syncTags($article, $request->input('tags'));
        return $article;
    }
}
