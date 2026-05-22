<!-- use Illuminate\Foundation\Http\Middleware\TrimStrings -->
<h2>Register</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/register">
    @csrf

    <input type="text" name="name" placeholder="Name" value="{{old('name')}}">
    <br><br>

    <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
    <br><br>

    <input type="password" name="password" placeholder="Password">
    <br><br>

    <button type="submit">Register</button>
    <a href="{{route('log')}}">Login</a>
</form>