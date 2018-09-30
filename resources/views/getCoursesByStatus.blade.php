<html>
<head>
    <title>status</title>
</head>
<body>
<h1>Status</h1>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif
<ul>
    @foreach($courses as $course)
        <li>{{$course->course_name}}</li>
    @endforeach
</ul>
</body>
</html>