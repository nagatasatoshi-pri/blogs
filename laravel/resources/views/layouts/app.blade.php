<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <link rel="stylesheet" href="../../../public/css/register.css">
    <link rel="stylesheet" href="../../../public/css/content.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('blog') }}">TOPページ</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">

        @yield('content')
    </div>


</body>
</html>
