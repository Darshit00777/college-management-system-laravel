<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login Page</h2>

    <br/><br/>

    <form action="/login/checklogin" method="POST" >
        @csrf

        <label>Email : </label>
        <input type="email" name="email" />
        @error('email')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br/><br/>

        <label>Password : </label>
        <input type="password" name="password" />
        @error('password')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br/><br/>

        <button type="submit">Login</button>

    </form>

    <a href="/user/create">Register</a>
</body>
</html>