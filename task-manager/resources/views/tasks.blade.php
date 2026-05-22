<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
</head>
<body>

<h1>Task Manager</h1>

<hr>

<h2>Create Task</h2>

<input type="text" id="title" placeholder="Task Title">

<br><br>

<textarea id="description" placeholder="Task Description"></textarea>

<br><br>

<button onclick="createTask()">
    Create Task
</button>

<hr>

<h2>All Tasks</h2>

<button onclick="getTasks()">
    Load Tasks
</button>

<br><br>

<div id="tasks"></div>

<script>

async function createTask()
{
    let response = await fetch('/api/tasks', {

        method: 'POST',

        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },

        body: JSON.stringify({

            title: document.getElementById('title').value,

            description: document.getElementById('description').value
        })
    });

    let data = await response.json();

    console.log(data);

    alert('Task Created');

    document.getElementById('title').value = '';

    document.getElementById('description').value = '';

    getTasks();
}

async function getTasks()
{
    let response = await fetch('/api/tasks');

    let data = await response.json();

    console.log(data);

    let html = '';

    data.forEach(task => {

        html += `

            <div style="
                border:1px solid black;
                padding:10px;
                margin-bottom:10px;
            ">

                <p>
                    <strong>ID:</strong> ${task.id}
                </p>

                <input
                    type="text"
                    id="title_${task.id}"
                    value="${task.title}"
                >

                <br><br>

                <textarea
                    id="description_${task.id}"
                >${task.description}</textarea>

                <br><br>

                <button onclick="updateTask(${task.id})">
                    Update
                </button>

                <button onclick="deleteTask(${task.id})">
                    Delete
                </button>

            </div>
        `;
    });

    document.getElementById('tasks').innerHTML = html;
}

async function updateTask(id)
{
    let response = await fetch('/api/tasks/' + id, {

        method: 'PUT',

        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },

        body: JSON.stringify({

            title: document.getElementById('title_' + id).value,

            description: document.getElementById('description_' + id).value
        })
    });

    let data = await response.json();

    console.log(data);

    alert('Task Updated');

    getTasks();
}

async function deleteTask(id)
{
    let response = await fetch('/api/tasks/' + id, {

        method: 'DELETE',

        headers: {
            'Accept': 'application/json'
        }
    });

    let data = await response.json();

    console.log(data);

    alert('Task Deleted');

    getTasks();
}

getTasks();

</script>

</body>
</html>