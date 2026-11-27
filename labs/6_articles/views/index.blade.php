@extends('lab3::layout')

@section('title', 'Новости')

@push('styles')
    <style>
        .news { list-style: none; margin: 0; padding: 0; }
        .news li { padding-block: 1rem; }
        .news li + li { border-top: 1px solid #dae3ed; }
        .news h2 { margin: .3rem 0 .5rem; font-size: 1.25rem; line-height: 1.3; }
        .news time { color: #475569; }
        .news p { margin: 0; }
    </style>
@endpush

@section('content')
    <h1>Новости</h1>
    @if ($articles->isEmpty())
        <p>Новостей пока нет.</p>
    @else
        <ul class="news">
            @foreach ($articles as $article)
                <li>
                    <time datetime="{{ $article->published_at->toDateString() }}">{{ $article->published_at->format('d.m.Y') }}</time>
                    <h2 lang="la">{{ $article->title }}</h2>
                    <p lang="la">{{ $article->body }}</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
