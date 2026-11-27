@extends('lab7::layout')

@section('title', $article->title)

@section('crud-content')
    <p><a href="{{ route('lab7.home') }}">К списку статей</a></p>
    <h1>{{ $article->title }}</h1>
    <time datetime="{{ $article->published_at->toDateString() }}">{{ $article->published_at->format('d.m.Y') }}</time>
    <p class="crud-body">{{ $article->body }}</p>

    <div class="crud-actions">
        <a class="crud-button" href="{{ route('lab7.articles.edit', $article) }}">Редактировать</a>
        <form method="post" action="{{ route('lab7.articles.destroy', $article) }}" onsubmit="return confirm('Удалить эту статью?')">
            @csrf
            @method('DELETE')
            <button class="crud-button crud-danger" type="submit">Удалить</button>
        </form>
    </div>
@endsection
