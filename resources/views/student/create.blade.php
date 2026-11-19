<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>
<body>
    <h2>Add Detail</h2>

    <br/>

    <form action="/student/store" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- <input type="hidden" name="user_id" value="{{$user->id}}" /> -->
        <label>User ID : </label>
        <input type="text" name="user_id" value="{{$user->id}}" readonly />
        <br/><br/>

        <label> Student Name : </label>
        <input type="text" name="name" value="{{$user->name}}"/>
        @error('name')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br/><br/>

        <label>select Course : </label>
        <select name="course_id">
            <option value="">Select course</option>
            @foreach($courses as $c)
                <option value="{{$c->id}}">
                    {{$c->cname}}
                </option>
            @endforeach
        </select>
        @error('course_id')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br/><br/>

        <label>Gender : </label>
        <input type="radio" name="gender" value="Male" /> Male
        <input type="radio" name="gender" value="Female" /> Female
        <br/><br/>

        <label>Hobby : </label>
        <input type="checkbox" name="hobby[]" value="Cricket" /> Cricket
        <input type="checkbox" name="hobby[]" value="Reading" /> Reading
        <input type="checkbox" name="hobby[]" value="Music" /> Music
        <br/><br/>

        <label>Photo : </label>
        <input type="file" name="photo" />
        <br/><br/>

        <button type="submit">Add</button>

    </form>

    <a href="/student/index">display Page</a>
</body>
</html>