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
        <nav class="w-full flex justify-center items-center gap-4 my-4">
            @auth
            <form method='POST' action="{{route('logout')}}">
                @csrf
                <button
                    class="py-2 px-3 rounded-md bg-slate-200 hover:bg-blue-500 hover:text-slate-100 duration-200 transition-all"
                    type="submit">Logout</button>
            </form>
            @endauth
            @guest
            <a class="py-2 px-3 rounded-md {{request()->is('users/register') ? 'bg-blue-500 text-slate-100' : 'bg-slate-200 text-slate-800' }}"
                href="{{route('registerForm')}}">Register</a>
            <a class="py-2 px-3 rounded-md {{request()->is('users/login') ? 'bg-blue-500 text-slate-100' : 'bg-slate-200 text-slate-800' }}"
                href="{{route('loginForm')}}">Login</a>
            @endguest
        </nav>
    </header>
    <main class="w-full flex justify-center items-center flex-col p-10">
        {{$slot}}
    </main>
</body>

</html>