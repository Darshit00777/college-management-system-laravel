<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/course/create">Add Details</a>

    <br/>

    <h2>Details</h2>

    <br/>
    
    <table border="1">
        <tr>
            <th>Course Name</th>
            <th>Duration</th>
            <th>Fees</th>
            <th>Discount</th>
            <th>Final fees</th>
            <th>Action</th>
        </tr>

        @foreach($courses as $c)
            <tr>
                <td>{{$c->cname}}</td>
                <td>{{$c->duration}}</td>
                <td>{{$c->fees}}</td>
                <td>{{$c->discount}}</td>
                <td>{{$c->f_fees}}</td>
                <td>
                    <a href="/course/edit/{{$c->id}}">Edit</a>

                    <a href="/course/destroy/{{$c->id}}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>

    <br/>

    <a href="/login">Log Out</a>
</body>
</html>