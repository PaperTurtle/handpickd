<?php

namespace App\Http\Controllers;

/**
 * FaqController handles the display of the Frequently Asked Questions (FAQ) page.
 */
class FaqController extends Controller
{
    /**
     * Display the FAQ page.
     * This method returns the view that contains the FAQ content.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Returns the FAQ view.
     */
    public function index()
    {
        return view('faq.index');
    }
}
