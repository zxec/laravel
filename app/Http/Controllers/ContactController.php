<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Show all contacts.
     *
     * @return View
     */
    public function index(): View
    {
        return view('pages.contact');
    }
}
