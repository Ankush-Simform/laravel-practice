<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>

<h1>Signup Form</h1>

<form method="POST" action="/signup">

    <!-- @csrf -->

    <input type="text" name="name" placeholder="Enter Name">
    <br><br>

    <input type="email" name="email" placeholder="Enter Email"><br><br>
    <input type="tel" name="tel" placeholder="Contact no">
    <br><br>

    <input type="password" name="password" placeholder="Enter Password">
    <br><br>


    <button type="submit">Signup</button>

</form>

</body>
</html>