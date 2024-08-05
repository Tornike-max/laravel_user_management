<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="max-w-[2200px] w-full">
    <header class="w-full top-0 left-0">
        <nav class="w-full flex justify-center items-center gap-4">
            @auth
            <form method='POST' action="{{route('logout')}}">
                @csrf
                <button type="submit">Logout</button>
            </form>
            @endauth
            @guest
            <a href="{{route('registerForm')}}">Register</a>
            <a href="{{route('loginForm')}}">Login</a>
            @endguest
        </nav>
    </header>
    <main class="w-full flex justify-center items-center flex-col p-10">
        {{$slot}}
    </main>
</body>

</html>