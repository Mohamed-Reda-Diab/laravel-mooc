@extends('mooc')
@section('title','addCategory')
@section('page head')
    <h1>add courseCategory</h1>
    <p>all is free</p>
@endsection

@section('content')
<form method="post" action="{{url('addCourseCategory')}}">
    Category name      <input type="text" name="category_name"><br/>

    Created by    <select name="created_by">
        @foreach($users as $us)
            <option value="{{$us->id}}">{{$us->username}}</option>
        @endforeach
    </select><br/>
    Is Active     <select name="active">
        <option value="1">Active</option>
        <option value="0">Not Active</option>
    </select><br/>
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <button type="submit">Add</button>
</form>
@endsection