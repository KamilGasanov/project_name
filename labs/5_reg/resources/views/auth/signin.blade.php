@extends('lab3::layout')

@section('title', 'Регистрация')

@push('styles')
    <style>
        .registration { display: grid; gap: 1rem; max-width: 28rem; }
        .registration label { display: block; font-weight: 600; }
        .registration input {
            width: 100%;
            padding: .6rem .75rem;
            border: 1px solid #75899e;
            border-radius: .4rem;
            font: inherit;
        }
        .registration [aria-invalid="true"] { border-color: #a32121; }
        .registration small { display: block; margin-top: .25rem; }
        .registration .error { color: #a32121; }
        .registration button {
            justify-self: start;
            padding: .6rem 1rem;
            border: 0;
            border-radius: .4rem;
            background: #17263b;
            color: #fff;
            font: inherit;
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    <h1>Регистрация</h1>
    <form class="registration" method="post" action="{{ route('lab5.registration') }}">
        @csrf
        <div>
            <label for="name">Имя</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}"
                autocomplete="name" maxlength="255" required
                @error('name') aria-invalid="true" aria-describedby="name-error" @enderror>
            @error('name')
                <small class="error" id="name-error">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <label for="email">Электронная почта</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}"
                autocomplete="email" maxlength="255" required
                @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>
            @error('email')
                <small class="error" id="email-error">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <label for="password">Пароль</label>
            <input id="password" name="password" type="password"
                autocomplete="new-password" minlength="8" maxlength="255" required
                aria-describedby="password-hint @error('password') password-error @enderror"
                @error('password') aria-invalid="true" @enderror>
            <small id="password-hint">Минимум 8 символов.</small>
            @error('password')
                <small class="error" id="password-error">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit">Зарегистрироваться</button>
    </form>
@endsection
