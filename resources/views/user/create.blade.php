<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <br/>

    <form action="/user/store" method="POST" >
        @csrf

        <label>Name : </label>
        <input type="text" name="name" />
        @error('name')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br/><br/>

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

        <label>Role : </label>
        <select name="role">
            <option value="">Select Role</option>
            <option value="teacher">Teacher</option>
            <option value="student">Student</option>
        </select>
        @error('role')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br/><br/>

        <button type="submit">Register</button>
    </form>

    <a href="/user/login">Login Page</a>
</body>
</html>