<html>

<head>
    <title>Blade form project</title>
    @stack('styles')
</head>

<body>
    @include ('partials.navbar')

    <div style="max-width: 400px; margin:auto ; padding:20px;">
        {{$slot}}
    </div>

    @stack('scripts')
</body>

</html> 