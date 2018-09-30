<html>
<head>
    <title>update user group</title>
</head>
<body>
<h1>Update user group</h1>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif
<form method="post" action="{{url('updateUserGroup')}}">
    Group name   <input type="text" name="group_name" @foreach($userGroups as $ug)
                                                      value="{{$ug->group_name}}"><br/>
                                                      @endforeach
                 <input type="hidden" name="group_id" @foreach($userGroups as $ug)
                                                               value="{{$ug->group_id}}" >
                                                      @endforeach

    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <button type="submit">Save</button>
</form>
</body>
</html>