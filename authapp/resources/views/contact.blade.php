<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
</head>
<body>

<h2>Contact Form</h2>

<form action="/contact" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Name"><br><br>
    <input type="text" name="message" placeholder="Message"><br><br>

    <button type="submit">Send</button>
</form>

</body>
</html> 