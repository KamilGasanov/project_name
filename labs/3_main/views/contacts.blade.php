@extends('lab3::layout')

@section('title', 'Контакты')

@section('content')
    <h1>Контакты</h1>
    <dl>
        @foreach ($contacts as $contact)
            <dt>{{ $contact['label'] }}</dt>
            <dd>{{ $contact['value'] }}</dd>
        @endforeach
    </dl>
@endsection
