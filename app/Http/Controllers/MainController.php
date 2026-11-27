<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        return view('lab4::home', ['articles' => $this->articles()]);
    }

    public function galery(string $article): View
    {
        $entry = $this->articles()[$article] ?? null;

        abort_if($entry === null, 404);

        return view('lab4::galery', ['article' => $entry]);
    }

    private function articles(): array
    {
        return json_decode(File::get(public_path('assets/4_preview/articles.json')), true, 512, JSON_THROW_ON_ERROR);
    }
}
