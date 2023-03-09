<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Tag;

class TagsController extends Controller
{
    /**
     * Show a single tag.
     *
     * @param Tag $tag
     * @return View
     */
    public function show(Tag $tag): View
    {
        return view('articles.index')->with('articles', $tag->articles()->published()->get());
    }
}
