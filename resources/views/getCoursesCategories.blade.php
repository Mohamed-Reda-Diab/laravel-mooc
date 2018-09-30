<html>
<head>
    <title>All courses categories</title>
</head>
<body>
<h1>Categories</h1>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif
<ul>
    @foreach($categories as $category)
        <li>{{$category->category_name}}</li>
    @endforeach
</ul>
</body>
</html>