@extends('lab7::layout')

@section('title', $article->exists ? 'Редактирование статьи' : 'Новая статья')

@section('crud-content')
    <h1>@yield('title')</h1>
    <form class="crud-form" method="post" action="{{ $article->exists ? route('lab7.articles.update', $article) : route('lab7.articles.store') }}">
        @csrf
        @if ($article->exists)
            @method('PUT')
        @endif

        <div>
            <label for="title">Заголовок</label>
            <input id="title" name="title" value="{{ old('title', $article->title) }}" maxlength="255" required
                @error('title') aria-invalid="true" aria-describedby="title-error" @enderror>
            @error('title') <p class="crud-error" id="title-error">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="body">Текст статьи</label>
            <textarea id="body" name="body" rows="8" required
                @error('body') aria-invalid="true" aria-describedby="body-error" @enderror>{{ old('body', $article->body) }}</textarea>
            @error('body') <p class="crud-error" id="body-error">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="published_at">Дата публикации</label>
            <input id="published_at" name="published_at" type="date" value="{{ old('published_at', $article->published_at?->toDateString() ?? today()->toDateString()) }}" required
                @error('published_at') aria-invalid="true" aria-describedby="date-error" @enderror>
            @error('published_at') <p class="crud-error" id="date-error">{{ $message }}</p> @enderror
        </div>
        <div class="crud-actions">
            <button class="crud-button" type="submit">Сохранить</button>
            <a href="{{ $article->exists ? route('lab7.articles.show', $article) : route('lab7.home') }}">Отмена</a>
        </div>
    </form>
@endsection
