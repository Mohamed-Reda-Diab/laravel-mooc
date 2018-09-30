@extends('mooc')
@section('title','addLesson')
@section('page head')
    <h1>add lesson</h1>
    <p>all lessons are free</p>
@endsection

@section('content')
<form method="post" action="{{url('addLesson')}}">
    lesson title  <input type="text" name="lesson_title"><br/>
    lesson description <textarea cols="200" rows="5" name="lesson_description">
                      </textarea><br>
    lesson video  <input type="text" name="lesson_video"><br>
                  <input type="hidden" name="lesson_course" value="4">
                  <input type="hidden" name="lesson_instructor" value="4">




    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <button type="submit">Add lesson</button>
</form>
@endsection