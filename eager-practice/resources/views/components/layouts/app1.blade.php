<html>
    <head>
        <title>Register</title>
        @stack 'styles';
    </head>
    <body>
        @include ('partials.navbar')
        <div style="max-width:400px; margin:auto ; padding:20px"></div>
        {{$slot}}

        @stack 'scripts';
    </body>
</html>