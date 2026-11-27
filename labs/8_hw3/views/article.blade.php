@extends('lab7::layout')

@section('title', $article->title)

@section('crud-content')
    <p><a href="{{ route('lab8.home') }}">К списку статей</a></p>
    <h1>{{ $article->title }}</h1>
    <p class="crud-body">{{ $article->body }}</p>

    <h2>Комментарии</h2>
    <ul class="crud-list">
        @forelse ($comments as $entry)
            <li>
                <strong>{{ $entry->author }}</strong>
                <p class="crud-body">{{ $entry->body }}</p>
                <div class="crud-actions">
                    <a href="{{ route('lab8.articles.comments.edit', [$article, $entry]) }}">Редактировать</a>
                    <form method="post" action="{{ route('lab8.articles.comments.destroy', [$article, $entry]) }}" onsubmit="return confirm('Удалить комментарий?')">
                        @csrf
                        @method('DELETE')
                        <button class="crud-button crud-danger" type="submit">Удалить</button>
                    </form>
                </div>
            </li>
        @empty
            <li>Комментариев пока нет.</li>
        @endforelse
    </ul>

    <h2>Добавить комментарий</h2>
    @include('lab8::form')
@endsection
