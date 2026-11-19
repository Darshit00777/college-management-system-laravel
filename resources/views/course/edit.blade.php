<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
    <h2>update Detail</h2>

    <br/>

    <form action="/course/update/{{$course->id}}" method="POST" >
        @csrf

        <label> Course Name : </label>
        <input type="text" name="cname" value="{{$course->cname}}" />
        @error('cname')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br/><br/>

        <label>Duration : </label>
        <input type="number" name="duration" value="{{$course->duration}}"/>
        @error('duration')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br/><br/>

        <label>Fees : </label>
        <input type="number" name="fees" value="{{$course->fees}}"/>
        @error('fees')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br/><br/>

        <label>Discount : </label>
        <input type="number" name="discount" value="{{$course->discount}}"/>
        @error('discount')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br/><br/>

        <button type="submit">Add</button>
    </form>

    <a href="/course/index">display Page</a>
</body>
</html>