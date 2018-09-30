@extends('mooc')
@section('title','addStudent')
@section('page head')
    <h1>add course student</h1>
    <p>all is free</p>
@endsection



@section('content')
<form method="post" action="{{url('addCourseStudent')}}">

    Student    <select name="student_id">
        @foreach($users as $us)
            <option value="{{$us->id}}">{{$us->username}}</option>
        @endforeach
    </select><br/>
    course    <select name="course_id">
        @foreach($courses as $course)
            <option value="{{$course->course_id}}">{{$course->course_name}}</option>
        @endforeach
    </select><br>
            Is approved    <select name="is_approved">
                <option value="1">Active</option>
                <option selected value="0">Not Active</option>
            </select><br/>
    </select><br/>

    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <button type="submit">Add course student</button>
</form>
@endsection
