<html>
<head>
    <title>mooc @yield('title')</title>
</head>
<body>

@yield('page head')

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif

@yield('content')

</body>
</html>