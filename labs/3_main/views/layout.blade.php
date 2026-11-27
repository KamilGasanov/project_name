<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') · Учебный сайт</title>
    <style>
        * { box-sizing: border-box; }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            background: #f1f5f9;
            color: #17263b;
            font: 1rem/1.6 system-ui, sans-serif;
        }
        .container { width: min(52rem, calc(100% - 2rem)); margin-inline: auto; }
        header { background: #17263b; }
        nav { display: flex; flex-wrap: wrap; gap: .5rem; padding-block: .75rem; }
        nav a { color: #fff; text-decoration: none; padding: .4rem .75rem; border-radius: .4rem; }
        nav a:hover, nav a[aria-current="page"] { background: #334e6d; }
        main { flex: 1; padding-block: clamp(2rem, 8vw, 5rem); }
        article {
            background: #fff;
            border: 1px solid #dae3ed;
            border-radius: 1rem;
            padding: clamp(1.25rem, 5vw, 3rem);
        }
        h1 { margin: 0 0 1rem; font-size: clamp(1.8rem, 5vw, 2.75rem); line-height: 1.15; }
        p:last-child, dl:last-child { margin-bottom: 0; }
        dt { font-weight: 650; }
        dd { margin: 0 0 .75rem; overflow-wrap: anywhere; }
        dd:last-child { margin-bottom: 0; }
        footer { border-top: 1px solid #dae3ed; padding-block: 1rem; }
    </style>
    @stack('styles')
</head>
<body>
    <header>
        <nav class="container" aria-label="Основное меню">
            @php
                $routePrefix = match (true) {
                    request()->routeIs('lab7.*') => 'lab7.',
                    request()->routeIs('lab6.*') => 'lab6.',
                    request()->routeIs('lab4.*') => 'lab4.',
                    default => 'lab3.',
                };
            @endphp
            @foreach (['home' => 'Главная', 'about' => 'О нас', 'contacts' => 'Контакты'] as $page => $label)
                <a href="{{ route($routePrefix.$page) }}" @if (request()->routeIs($routePrefix.$page)) aria-current="page" @endif>{{ $label }}</a>
            @endforeach
        </nav>
    </header>
    <main class="container">
        <article>
            @yield('content')
        </article>
    </main>
    <footer>
        <div class="container">Гасанов Камиль Нурбагандович · Группа 251-3210</div>
    </footer>
</body>
</html>
