@extends('mooc')
@section('title','addRate')
@section('page head')
    <h1>add rate</h1>

@endsection

@section('content')
<form method="post" action="{{url('addRate')}}">
    student_id  <select name="student_id">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->username}}</option>
                    @endforeach
    </select><br>
    course_id <select name="course_id">
           @foreach($courses as $course)
               <option value="{{$course->course_id}}">{{$course->course_name}}</option>
               @endforeach
    </select><br>
    rate<select name="rate">
        <option value="{{1}}">{{1}}</option>
        <option value="{{2}}">{{2}}</option>
        <option value="{{3}}">{{3}}</option>
        <option value="{{4}}">{{4}}</option>
        <option value="{{5}}">{{5}}</option>
    </select><br>
    rate_comment <textarea cols="200" rows="5" name="rate_comment">
                      </textarea><br>






    <input type="hidden" name="_token" value="{{csrf_token()}}"><br>

    <button type="submit">Add rate</button>
</form>
    @endsection