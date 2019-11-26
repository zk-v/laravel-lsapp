<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Welcome to Laravel';
        // index should return the view inside pages named index
        // -> with(...) binds some data to view
        return view('pages.index')->with('title', $title);
    }
    public function about() {
        return view('pages.about');
    }
    public function services() {
        $data = array(
            'title' => 'Services',
            'services' => ['Site Design', 'SEO', 'Programming'],

        );
        return view('pages.services')->with($data);
    }
}
