<h2>Login</h2>

@if(session('error'))
    <p>{{ session('error') }}</p>
@endif

<form method="POST" action="/login">
    @csrf
    <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
    <br><br>

    <input type="password" name="password" placeholder="Password">
    <br><br>

    <button type="submit">Login</button>
</form>