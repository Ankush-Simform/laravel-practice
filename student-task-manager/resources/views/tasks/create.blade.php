<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>

<h1>Create Task</h1>

@if($errors->any())
    <div style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <input type="text" name="title" placeholder="Enter task title">

    <button type="submit">Save Task</button>
</form>

</body>
</html>