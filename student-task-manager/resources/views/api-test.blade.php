<!DOCTYPE html>
<html>
<head>
    <title>API CRUD</title>
</head>
<body>

<h2>Create User</h2>

<input type="text" id="name" placeholder="Name">
<br><br>

<input type="email" id="email" placeholder="Email">
<br><br>

<input type="number" id="age" placeholder="Age">
<br><br>

<button onclick="createUser()">Create User</button>

<hr>

<h2>All Users</h2>

<button onclick="getUsers()">Load Users</button>

<br><br>

<div id="users"></div>

<script>

async function createUser()
{
    let response = await fetch('/api/users', {

        method: 'POST',

        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },

        body: JSON.stringify({

            name: document.getElementById('name').value,

            email: document.getElementById('email').value,

            age: document.getElementById('age').value
        })
    });

    let data = await response.json();

    console.log(data);

    alert('User Created');

    getUsers();
}

async function getUsers()
{
    let response = await fetch('/api/users');

    let data = await response.json();

    console.log(data);

    let html = '';

    data.data.forEach(user => {

        html += `

            <div style="border:1px solid black; padding:10px; margin-bottom:10px;">

                <p>ID: ${user.id}</p>

                <input 
                    type="text" 
                    id="name_${user.id}" 
                    value="${user.name}"
                >

                <br><br>

                <input 
                    type="email" 
                    id="email_${user.id}" 
                    value="${user.email}"
                >

                <br><br>

                <input 
                    type="number" 
                    id="age_${user.id}" 
                    value="${user.age}"
                >

                <br><br>

                <button onclick="updateUser(${user.id})">
                    Update
                </button>

                <button onclick="deleteUser(${user.id})">
                    Delete
                </button>

            </div>
        `;
    });

    document.getElementById('users').innerHTML = html;
}

async function updateUser(id)
{
    let response = await fetch('/api/users/' + id, {

        method: 'PUT',

        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },

        body: JSON.stringify({

            name: document.getElementById('name_' + id).value,

            email: document.getElementById('email_' + id).value,

            age: document.getElementById('age_' + id).value
        })
    });

    let data = await response.json();

    console.log(data);

    alert('User Updated');

    getUsers();
}

async function deleteUser(id)
{
    let response = await fetch('/api/users/' + id, {

        method: 'DELETE',

        headers: {
            'Accept': 'application/json'
        }
    });

    let data = await response.json();

    console.log(data);

    alert('User Deleted');

    getUsers();
}

</script>

</body>
</html>