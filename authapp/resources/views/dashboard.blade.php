<h1>Dashboard</h1>

<p>Welcome {{ auth()->user()->name }}</p>
<p>{{url('')}}</p>
<p>{{ url("users/" . auth()->user()->id) }}</p>
{{-- <p>{{url()->query('/users',['role'->'admin'])}}</p> --}}
<p>{{url()->current() }}</p>
<p>{{url()->full() }}</p>
<p>{{URL::current()}}</p>
<p>{{url()->previous() }}</p>
<p>{{url()->previousPath() }}</p>


<form method="POST" action="/logout">
    @csrf
    <button type="submit">Logout</button>
</form>