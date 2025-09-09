<!-- resources/views/auth.blade.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
</head>
<body>
    <div style="border: 3px solid black; padding:10px;">
        <h1>Register</h1>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>

    <div style="border: 3px solid black; padding:10px; margin-top:10px;">
        <h1>Login</h1>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginname" placeholder="name">
            <input type="password" name="loginpassword" placeholder="password">
            <button>Login</button>
        </form>
    </div>
</body>
</html>
