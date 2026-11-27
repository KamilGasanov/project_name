@extends('lab3::layout')

@section('title', $article['name'])

@push('styles')
    <style>
        .gallery-image { display: block; max-width: 100%; height: auto; border-radius: .5rem; }
    </style>
@endpush

@section('content')
    <p><a href="{{ route('lab4.home') }}">К списку статей</a></p>
    <h1 lang="en">{{ $article['name'] }}</h1>
    <img class="gallery-image" src="{{ asset('assets/4_preview/'.$article['full_image']) }}" alt="Иллюстрация к статье «{{ $article['name'] }}»">
    <p lang="en">{{ $article['desc'] }}</p>
@endsection
