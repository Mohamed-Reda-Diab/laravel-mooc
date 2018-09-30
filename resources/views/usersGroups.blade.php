<html>
<head>
    <title>Add UserGroup</title>
</head>
<body>
<h1>Add User group</h1>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif
<form method="post" action="{{url('addUserGroup')}}">
    Group name   <input type="text" name="group_name"><br/>

    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <button type="submit">Add</button>
</form>
</body>
</html>