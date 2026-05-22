<html>

<head>
    <title>{{ $appName }}</title>
</head>

<body>

    @include('partials.navbar')

    <div style="display:flex">

        @include('partials.sidebar')

        <div style="padding:20px;">
            {{ $slot ?? '' }}

            @yield('content')
        </div>

    </div>

</body>

</html>