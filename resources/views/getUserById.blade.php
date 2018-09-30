<html>
<head>
    <title>get user</title>
</head>
<body>
<h1>get user</h1>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif


       {{$user->username}}


</body>
</html>