<html>
<head>
    <title>Courses</title>
</head>
<body>
        <h1>courses</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach

            </div>
        @endif
        <ul>
      @foreach($coursesList as $course)
           <li>{{$course->username}}</li>
          @endforeach
        </ul>
</body>
</html>