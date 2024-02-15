<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
        <h1>You are logged in. Wohoo!!!!</h1>
        <form action="/logout" method="POST">
            @csrf
            <button>log out</button>
        </form>

        <div style="border: 3px solid black;">
            <h2>create a new post</h2>
            <form action="/create-post" method="POST">
                @csrf

                <input type="text" placeholder="post title" name="title">
                <textarea name="body" id="" placeholder="body content..." ></textarea>
                <input type="submit" value="Save Post">
            </form>
        </div>

        <div style="border: 3px solid black;">
            <h2>All Posts</h2>
            @foreach($posts as $post)
            <div class="" style="background-color: gray; padding:10px;margin:10px;">
                <h3>{{$post['title']}}</h3>
                {{$post['body']}}
            </div>
            @endforeach
        </div>


    @else
    {{-- register --}}
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

    {{-- login --}}
    <div style="border: 3px solid black; margin:30px 0;">
        <h2>Login</h2>
        <form action="/login" 
        method="POST"
        style="margin-bottom:5px ; margin-left:10px;">
        <!-- @csrf is to prevent a csrf attack -->
            @csrf
            <input type="text" placeholder="name" name="loginname">
            <input type="password" placeholder="password" name="loginpassword">
            <input type="submit" value="log in">
        </form>
    </div>

    @endauth
</body>
</html>