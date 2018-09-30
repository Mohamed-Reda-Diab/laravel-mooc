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
    @foreach($lessons as $lesson)
        <li>{{$lesson->lesson_title}}</li>
    @endforeach

</ul>
</body>
</html>