<!DOCTYPE html>
<html>

<head>
    <title>Tasks</title>
</head>

<body>
    <a href="{{ route('tasks.create') }}">+ Create Task</a>
    <hr>

    <h1>Task List Page</h1>

    <!-- @foreach($tasks as $task)
    <p>{{ $task->title }}</p>
    @endforeach -->


    <!-- @foreach($tasks as $task)
    <p>
        {{ $task->title }}

    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    </p>
    @endforeach -->

    @foreach($tasks as $task)
    <p>
        {{ $task->title }}

        <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>

        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </p>
@endforeach
</body>

</html>