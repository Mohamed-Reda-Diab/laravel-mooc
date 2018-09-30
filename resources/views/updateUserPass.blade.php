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
<form method="post" action="{{url('updatePass')}}">
    <input type="hidden" name="id" value="{{$user->id}}">

    Password      <input type="password" name="password" value="{{$user->password}}"><br/>





    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <button type="submit">Update</button>
</form>
</body>
</html>