<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    /**
     * Show page about
     *
     * @return View
     */
    public function about(): View
    {
        return view('pages.about')->with('people', ['Taylor Otwell', 'Dayle Rees', 'Eric Barnes']);
    }

    /**
     * Show page contact
     *
     * @return View
     */
    public function contact(): View
    {
        return view('pages.contact');
    }
}
