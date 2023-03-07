<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Http\Requests\ArticleRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ArticlesController extends Controller
{
    /**
     * Show all articles
     *
     * @return View
     */
    public function index(): View
    {
        return view('articles.index', ['articles' => Article::latest('published_at')->published()->get()]);
    }

    /**
     * Show a single articles
     *
     * @param Article $article
     * @return View
     */
    public function show(Article $article): View
    {
        return view('articles.show')->with('article', $article->load('tags'));
    }

    /**
     * Show create article form.
     *
     * @return View
     */
    public function create(): View
    {
        return view('articles.create')->with('tags', Tag::pluck('name', 'id'));
    }

    /**
     * Show edit article form.
     *
     * @param Article $article
     * @return View
     */
    public function edit(Article $article): View
    {
        $tags = Tag::pluck('name', 'id');
        return view('articles.edit')->with([
            'tags' => $tags,
            'article' => $article->load('tags')
        ]);
    }

    /**
     * Save a new article
     *
     * @param ArticleRequest $request
     * @return RedirectResponse
     */
    public function store(ArticleRequest $request): RedirectResponse
    {
        $this->createArticle($request->validated());
        flash()->success('Your article has been created');
        return redirect('articles');
    }

    /**
     * Update an article.
     *
     * @param Article $article
     * @param ArticleRequest $request
     * @return RedirectResponse
     */
    public function update(Article $article, ArticleRequest $request): RedirectResponse
    {
        $request = $request->validated();
        $article->update($request);
        $article->tags()->sync($request['tags']);
        return redirect('articles');
    }

    /**
     * Create a new article.
     *
     * @param $request
     * @return Article
     */
    private function createArticle($request): Article
    {
        $article = Auth::user()->articles()->create($request);
        $article->tags()->sync($request['tags']);
        return $article;
    }
}
