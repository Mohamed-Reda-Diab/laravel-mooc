<html>
<head>
    <title>Welcome to add</title>
</head>
<body>
<h1>add user</h1>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif
<form method="post" action="{{url('UpdateUser')}}">
                  <input type="hidden" name="id" value="{{$updateUser->id}}">
    Username      <input type="text" name="username" value="{{$updateUser->username}}"><br/>
    Name          <input type="text" name="name" value="{{$updateUser->name}}"><br/>

    Email         <input type="text" name="email" value="{{$updateUser->email}}"><br/>

    Password      <input type="password" name="password" value="{{$updateUser->password}}"><br/>

    About:-       <textarea cols="200" rows="5" name="about" value="{{$updateUser->about}}">

                 </textarea><br/>

    User group    <select name="user_group">
        @foreach($userGroup as $ug)
            @if($ug->group_id == $updateUser->user_group)
                <option value="{{$ug->group_id}}">{{$ug->group_name}}</option>
            @else
                <option value="{{$ug->group_id}}">{{$ug->group_name}}</option>
            @endif
        @endforeach
    </select><br/>
    Is Active     <select name="active">
        @if($updateUser->is_active==1)
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