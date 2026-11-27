<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleCrudController extends Controller
{
    public function index(): View
    {
        return view('lab7::index', [
            'articles' => Article::latest('published_at')->orderByDesc('id')->paginate(5),
        ]);
    }

    public function create(): View
    {
        return view('lab7::form', ['article' => new Article()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $article = Article::create($this->validatedArticle($request));

        return redirect()->route('lab7.articles.show', $article)->with('status', 'Статья создана.');
    }

    public function show(Article $article): View
    {
        return view('lab7::show', compact('article'));
    }

    public function edit(Article $article): View
    {
        return view('lab7::form', compact('article'));
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $article->update($this->validatedArticle($request));

        return redirect()->route('lab7.articles.show', $article)->with('status', 'Статья обновлена.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('lab7.home')->with('status', 'Статья удалена.');
    }

    private function validatedArticle(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'published_at' => ['required', 'date_format:Y-m-d'],
        ], [
            'title.required' => 'Введите заголовок.',
            'title.string' => 'Заголовок должен быть текстом.',
            'title.max' => 'Заголовок должен содержать не более 255 символов.',
            'body.required' => 'Введите текст статьи.',
            'body.string' => 'Содержимое статьи должно быть текстом.',
            'published_at.required' => 'Укажите дату публикации.',
            'published_at.date_format' => 'Укажите корректную дату публикации.',
        ]);
    }
}
