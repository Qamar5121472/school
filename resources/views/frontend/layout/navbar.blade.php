<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel = "stylesheet" href = "{{ asset('frontEndAssets/css/style.css') }}">
    </head>

<body>

    <div class = "main" style = "background-image: url('{{ asset('frontEndAssets/images/1.jpg') }}')">
        <div class = "navbar">
            <div class = "icon">
                @php
                    $name = App\Models\Setting::first();
                @endphp <h2 class = "logo">
                    @if (isset($name))
                        {{ $name->name ?? 'School Name' }}
                    @else
                        School Name
                    @endif
                </h2>
            </div>

            <div class = "menu">
                <ul>
                    <li>
                        <a href = "{{ url('/') }}"> HOME </a>
                    </li>
                    <li>
                        <a href = "{{ route('about') }}"> ABOUT </a>
                    </li>
                    <li>
                        <a href = "{{ route('service') }}"> SERVICE
                        </a>
                    </li>
                    <li>
                        <a href = " {{ route('design') }}">
                            DESIGN </a>
                    </li>
                    <li>
                        <a href = "{{ route('contact') }}">
                            CONTACT </a>
                    </li>
                </ul>
            </div>
            <div class = "search">
                <input class = "srch" type = "search" name = "" placeholder = "Type To text">
                <a href = "#">
                    <button class = "btn">
                        Search
                    </button>
                </a>
            </div>

        </div>
        @yield('content')
    </div>
    </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>

</html>
