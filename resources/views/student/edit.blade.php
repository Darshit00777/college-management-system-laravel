<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student Detail</h2>

<form action="/student/update/{{$student->id}}/{{$uid}}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Student Name:</label>
    <input type="text" name="name" value="{{$student->name}}">
    <br><br>

    <label>Select Course:</label>
    <select name="course_id">
        <option value="">Select Course</option>
        @foreach($courses as $c)
            <option value="{{$c->id}}" {{$student->course_id == $c->id ? "selected" : ""}}>
                {{$c->cname}}
            </option>
        @endforeach
    </select>

    <label>Gender:</label>
        <input type="radio" name="gender" value="Male" {{$student->gender == 'Male' ? 'checked' : ''}}> Male

        <input type="radio" name="gender" value="Female" {{$student->gender == 'Female' ? 'checked' : ''}}> Female

        <br><br>

        <label>Hobby:</label>

        <input type="checkbox" name="hobby[]" value="Cricket" {{in_array('Cricket', $hobby) ? 'checked' : ''}}> Cricket

        <input type="checkbox" name="hobby[]" value="Reading" {{in_array('Reading', $hobby) ? 'checked' : ''}}> Reading

        <input type="checkbox" name="hobby[]" value="Music" {{in_array('Music', $hobby) ? 'checked' : ''}}> Music

        <br><br>

        <label>Photo:</label>
        <input type="file" name="photo">

        @if($student->photo)
            <br>
            <img src="{{asset('upload/'.$student->photo)}}" width="100">
        @endif

        <br><br>

        <button type="submit">Update</button>

    </form>

    <br>
    <a href="/student/{{$uid}}">Back</a>

</body>
</html>