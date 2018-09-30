<html>
<head>
    <title>User Group</title>
</head>
<body>
<h1>User Group</h1>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif
{{$userGroupId->group_name}}

</body>
</html>