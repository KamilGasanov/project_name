@extends('lab7::layout')

@section('title', 'Редактирование комментария')

@section('crud-content')
    <p><a href="{{ route('lab8.articles.show', $article) }}">К статье</a></p>
    <h1>Редактирование комментария</h1>
    @include('lab8::form')
@endsection
