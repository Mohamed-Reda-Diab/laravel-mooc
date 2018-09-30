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
<form method="post" action="{{url('updateCourse')}}">
    <input type="hidden" name="course_id" value="{{$course->course_id}}">
    Course name      <input type="text" name="course_name" value="{{$course->course_name }}"><br/>


    Categories    <select name="course_category">
        @foreach($categories as $category)
            @if($category->category_id == $course->course_category)
                <option selected value="{{$category->category_id}}">{{$category->category_name}}</option>
            @else
                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
            @endif
        @endforeach
    </select><br/>
    Instructor    <select name="course_instructor">
        @foreach($users as $user)
            @if($user->id == $course->course_instructor)
                <option selected value="{{$user->id}}">{{$user->username}}</option>
           @else
                <option selected value="{{$user->id}}">{{$user->username}}</option>
            @endif
        @endforeach
        </select><br/>
    Description:-        <textarea  cols="200" rows="5" name="course_description" >
                         {{$course->course_description}}
                 </textarea><br/>
    Cover:-      <input type="text" name="course_cover" value="{{$course->course_cover}}"><br/>

    Is Active     <select name="active">
        @if($course->is_active==1)
            <option selected value="1">Active</option>
            <option value="0">Not active</option>
        @else
            <option selected value="0">Not active</option>
            <option value="1">Active</option>
        @endif
    </select><br/>

    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <button type="submit">Update</button>
</form>
</body>
</html>