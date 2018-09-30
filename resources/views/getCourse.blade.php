<html>
<head>
    <title>Course</title>
</head>
<body>
<h1>Course</h1>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif
<ul>

       <li>{{$course->course_name}}</li>

</ul>
</body>
</html>