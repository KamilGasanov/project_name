@extends('lab3::layout')

@section('title', 'Статьи')

@push('styles')
    <style>
        .articles { list-style: none; margin: 0; padding: 0; }
        .articles li {
            display: grid;
            grid-template-columns: minmax(0, 10rem) minmax(0, 1fr);
            align-items: start;
            gap: 1.25rem;
            padding-block: 1.25rem;
        }
        .articles li + li { border-top: 1px solid #dae3ed; }
        .articles img { display: block; width: 100%; height: auto; border-radius: .5rem; }
        .articles h2 { margin: .25rem 0 .5rem; font-size: 1.25rem; line-height: 1.3; }
        .articles time { color: #475569; }
        .articles p { margin: 0; }
        @media (max-width: 36rem) {
            .articles li { grid-template-columns: 1fr; gap: .75rem; }
            .articles a { width: min(100%, 14rem); }
        }
    </style>
@endpush

@section('content')
    <h1>Статьи</h1>
    <ul class="articles">
        @foreach ($articles as $id => $article)
            <li>
                <a href="{{ route('lab4.galery', ['article' => $id]) }}" aria-label="Открыть изображение для статьи «{{ $article['name'] }}»">
                    <img src="{{ asset('assets/4_preview/'.$article['preview_image']) }}" alt="" loading="lazy">
                </a>
                <div>
                    <time datetime="{{ \Carbon\CarbonImmutable::createFromFormat('d.m.Y', $article['date'])->toDateString() }}">{{ $article['date'] }}</time>
                    <h2 lang="en">{{ $article['name'] }}</h2>
                    <p lang="en">{{ $article['shortDesc'] ?? \Illuminate\Support\Str::limit($article['desc'], 180) }}</p>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
