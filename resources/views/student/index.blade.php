<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/student/create/{{$uid}}">Add Details</a>

    <br/>

    <h2>Details</h2>

    <br/>
    
    <table border="1">
        <tr>
            <th>student Id</th>
            <th>Name</th>
            <th>Course</th>
            <th>Photo</th>
            <th>Gender</th>
            <th>Hobby</th>
            <th>Action</th>
        </tr>

        @foreach($students as $s)
            <tr>
                <td>{{$s->user_id}}</td>
                <td>{{$s->name}}</td>
                <td>{{$s->course->cname}}</td>
                <td>{{$s->photo}}</td>
                <td>{{$s->gender}}</td>
                <td>{{$s->hobby}}</td>
                <td>
                    <a href="/student/edit/{{$s->id}}/{{$uid}}">Edit</a>

                    <a href="/student/destroy/{{$s->id}}/{{$uid}}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>

    <br/>

    <a href="/login">Log Out</a>
</body>
</html>