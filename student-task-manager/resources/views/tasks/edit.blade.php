<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>

<h1>Edit Task</h1>

@if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $task->title }}">

    <button type="submit">Update Task</button>
</form>

</body>
</html>