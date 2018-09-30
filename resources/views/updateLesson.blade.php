

<html>
<head>
    <title>Welcome to Update</title>
</head>
<body>
<h1>update course</h1>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif



<form role="form" action="{{url('updateLesson')}}" method="post">

        <label >Title</label>
        <input type="text" name="lesson_title" value="{{$lesson->lesson_title}}"><br/>
        <label >lesson_Vedio</label><br>
        <input type="text" name="lesson_video" value="{{$lesson->lesson_video}}"><br/>
        <label > lesson_description</label><br>
        <textarea  name="lesson_description" cols="150" rows="10"
        >{{$lesson->lesson_description}}</textarea><br>
        <input type="hidden" name="lesson_id" value="{{$lesson->lesson_id}}">


    <label > lesson_course</label><br>
    <select  name="lesson_course">
        @foreach($courses as $course)
            @if($course->course_id == $lesson->lesson_course)
            <option selected value="{{$course->course_id}}">{{$course->course_name}}</option>

          @else
                <option  value="{{$course->course_id}}">{{$course->course_name}}</option>
            @endif
        @endforeach
    </select><br/>
        <label > lesson_instructor</label><br>
        <select  name="lesson_instructor">
            @foreach($instructors as $ins)
                @if($ins->id == $lesson->lesson_id)
                <option selected value="{{$ins->id}}">{{$ins->username}}</option>
                @else
                    <option value="{{$ins->id}}">{{$ins->username}}</option>
                @endif
            @endforeach
        </select><br/>


    <input type="hidden" name="_token" value="{{csrf_token()}}">


    <button type="submit" class="btn btn-info">Update Lesson</button>
</form>
</body>
</html>