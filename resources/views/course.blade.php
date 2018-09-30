@extends('mooc')
@section('title','addCourse')
@section('page head')
    <h1>add course</h1>
    <p>all courses are free</p>
@endsection

@section('content')
        <form method="post" action="{{url('add')}}">
          Title        <input type="text" name="title"><br/>
          Description  <textarea cols="200" rows="5" name="description">
                       </textarea><br/>
          Category     <select name="category">
                          @foreach($categories as $cat)
                              <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                             @endforeach
                     </select><br/>
          Is Active  <select name="active">
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
            </select><br/>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="instructor" value="1">
            <button type="submit">Register</button>
        </form>
@endsection