<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" 
        method="POST"
        style="margin-bottom:5px ; margin-left:10px;">
        <!-- @csrf is to prevent a csrf attack -->
            @csrf
            <input type="text" placeholder="name" name="name">
            <input type="email" placeholder="email" name="email">
            <input type="password" placeholder="password" name="password">
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>