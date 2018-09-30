<html>
<head>
    <title>Categories</title>
</head>
<body>
<h1>search category</h1>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif
<ul>
    @foreach($category as $cat)
        <li>{{$cat->category_name}}</li>
    @endforeach
</ul>
</body>
</html>