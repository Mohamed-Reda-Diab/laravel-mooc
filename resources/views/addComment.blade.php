@extends('mooc')
@section('title','addComment')
@section('page head')
    <h1>add comment</h1>
    <p>welcome to add comment</p>
    @endsection

@section('content')
<form method="post" action="{{url('addComment')}}">

         Comment <textarea name="comment" cols="100" rows="6"></textarea><br>
    created_by    <select name="created_by">
        @foreach($users as $us)
            <option value="{{$us->id}}">{{$us->username}}</option>
        @endforeach
    </select><br/>
    lesson    <select name="lesson_id">
        @foreach($lessons as $lesson)
            <option value="{{$lesson->lesson_id}}">{{$lesson->lesson_title}}</option>
        @endforeach
    </select><br>


    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <button type="submit">Add comment</button>
</form>
@endsection

