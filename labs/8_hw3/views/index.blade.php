@extends('lab7::layout')

@section('title', 'Комментарии к статьям')

@section('crud-content')
    <h1>Комментарии к статьям</h1>
    <ul class="crud-list">
        @forelse ($articles as $article)
            <li>
                <h2><a href="{{ route('lab8.articles.show', $article) }}">{{ $article->title }}</a></h2>
                <span>Комментариев: {{ $article->comments_count }}</span>
            </li>
        @empty
            <li>Статей пока нет.</li>
        @endforelse
    </ul>
@endsection
