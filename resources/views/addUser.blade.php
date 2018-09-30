@extends('mooc')
@section('title','addUser')
@section('page head')
    <h1>add user</h1>

@endsection

@section('content')
<form method="post" action="{{url('addUser')}}">
    Username      <input type="text" name="username"><br/>
    Name          <input type="text" name="name"><br/>
    Email         <input type="text" name="email"><br/>
    Password      <input type="text" name="password"><br>
    About:-       <textarea cols="200" rows="5" name="about"></textarea><br/>

    User group    <select name="user_group">
                    @foreach($addUser as $us)
                        <option value="{{$us->group_id}}">{{$us->group_name}}</option>
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
