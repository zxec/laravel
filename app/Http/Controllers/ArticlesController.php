<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Http\Requests\ArticleRequest;
use App\Services\ArticleService;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ArticlesController extends Controller
{

    public ArticleService $service;

    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }

    /**
     * Show all articles.
     *
     * @return View
     */
    public function index(): View
    {
        return view('articles.index', ['articles' => Article::latest('published_at')->published()->get()]);
    }

    /**
     * Show a single articles.
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
     * Save a new article.
     *
     * @param ArticleRequest $request
     * @return RedirectResponse
     */
    public function store(ArticleRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        $this->service->flashSuccess('Your article has been created');
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
        $this->service->update($article, $request->validated());
        return redirect('articles');
    }
}
