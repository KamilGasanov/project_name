@extends('lab7::layout')

@section('title', 'Управление статьями')

@section('crud-content')
    <h1>Управление статьями</h1>
    <a class="crud-button" href="{{ route('lab7.articles.create') }}">Добавить статью</a>

    @if ($articles->isEmpty())
        <p>{{ $articles->total() ? 'На этой странице нет статей.' : 'Статей пока нет.' }}</p>
    @else
        <ul class="crud-list">
            @foreach ($articles as $article)
                <li>
                    <time datetime="{{ $article->published_at->toDateString() }}">{{ $article->published_at->format('d.m.Y') }}</time>
                    <h2><a href="{{ route('lab7.articles.show', $article) }}">{{ $article->title }}</a></h2>
                </li>
            @endforeach
        </ul>
    @endif

    @if ($articles->hasPages())
        <div class="crud-actions" role="navigation" aria-label="Страницы статей">
            @if ($articles->currentPage() > $articles->lastPage())
                <a href="{{ $articles->url($articles->lastPage()) }}">К последней странице</a>
            @else
                @if ($articles->previousPageUrl())
                    <a href="{{ $articles->previousPageUrl() }}" rel="prev">Предыдущая</a>
                @endif
                <span>Страница {{ $articles->currentPage() }} из {{ $articles->lastPage() }}</span>
                @if ($articles->nextPageUrl())
                    <a href="{{ $articles->nextPageUrl() }}" rel="next">Следующая</a>
                @endif
            @endif
        </div>
    @endif
@endsection
