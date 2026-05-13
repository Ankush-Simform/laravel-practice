<h2>Login</h2>

@if(session('error'))
    <p>{{ session('error') }}</p>
@endif

<form method="POST" action="/login">
    @csrf

    <input type="email" name="email" placeholder="Email">
    <br><br>

    <input type="password" name="password" placeholder="Password">
    <br><br>

    <button type="s ubmit">Login</button>
</form>