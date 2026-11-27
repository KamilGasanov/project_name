<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function articles(): View
    {
        return view('lab8::index', [
            'articles' => Article::withCount('comments')->latest('published_at')->orderByDesc('id')->get(),
        ]);
    }

    public function index(Article $article): View
    {
        return view('lab8::article', [
            'article' => $article,
            'comments' => $article->comments()->latest('id')->get(),
            'comment' => new Comment(),
        ]);
    }

    public function store(Request $request, Article $article): RedirectResponse
    {
        $article->comments()->create($this->validatedComment($request));

        return redirect()->route('lab8.articles.show', $article)->with('status', 'Комментарий добавлен.');
    }

    public function edit(Article $article, Comment $comment): View
    {
        return view('lab8::edit', compact('article', 'comment'));
    }

    public function update(Request $request, Article $article, Comment $comment): RedirectResponse
    {
        $comment->update($this->validatedComment($request));

        return redirect()->route('lab8.articles.show', $article)->with('status', 'Комментарий обновлён.');
    }

    public function destroy(Article $article, Comment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect()->route('lab8.articles.show', $article)->with('status', 'Комментарий удалён.');
    }

    private function validatedComment(Request $request): array
    {
        return $request->validate([
            'author' => ['required', 'string', 'max:100'],
            'body' => ['required', 'string', 'max:3000'],
        ], [
            'author.required' => 'Введите имя.',
            'author.string' => 'Имя должно быть текстом.',
            'author.max' => 'Имя должно содержать не более 100 символов.',
            'body.required' => 'Введите комментарий.',
            'body.string' => 'Комментарий должен быть текстом.',
            'body.max' => 'Комментарий должен содержать не более 3000 символов.',
        ]);
    }
}
