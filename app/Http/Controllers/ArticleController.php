<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('lab6::index', [
            'articles' => Article::latest('published_at')->orderByDesc('id')->get(),
        ]);
    }
}
