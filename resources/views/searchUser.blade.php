<html>
<head>
    <title>All users groups</title>
</head>
<body>
<h1>Users groups</h1>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif
<ul>
    @foreach($users as $user)
        <li>{{$user->username}}</li>
    @endforeach
</ul>
</body>
</html>