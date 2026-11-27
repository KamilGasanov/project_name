@extends('lab3::layout')

@push('styles')
    <style>
        .crud-list { list-style: none; padding: 0; }
        .crud-list li { border-bottom: 1px solid #dae3ed; padding-block: .8rem; }
        .crud-list h2 { margin: .25rem 0 0; font-size: 1.25rem; }
        .crud-actions { display: flex; flex-wrap: wrap; align-items: center; gap: .75rem; }
        .crud-form { display: grid; gap: 1rem; }
        .crud-form label { display: block; font-weight: 600; }
        .crud-form input, .crud-form textarea {
            width: 100%;
            border: 1px solid #75899e;
            border-radius: .4rem;
            padding: .5rem;
            font: inherit;
        }
        .crud-button {
            display: inline-block;
            width: fit-content;
            background: #17263b;
            color: #fff;
            border: 0;
            border-radius: .4rem;
            padding: .45rem .8rem;
            font: inherit;
            text-decoration: none;
            cursor: pointer;
        }
        .crud-danger { background: #9b2424; }
        .crud-error { color: #9b2424; margin: 0; }
        .crud-body { white-space: pre-wrap; overflow-wrap: anywhere; }
    </style>
@endpush

@section('content')
    @if (session('status'))
        <p role="status">{{ session('status') }}</p>
    @endif
    @yield('crud-content')
@endsection
