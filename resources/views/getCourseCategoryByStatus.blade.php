<html>
<head>
    <title>get category by status</title>
</head>
<body>
<h1>get category by status</h1>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif



@foreach($categories as $cat)
    <li>{{$cat->category_name}}</li>
@endforeach


</body>
</html>