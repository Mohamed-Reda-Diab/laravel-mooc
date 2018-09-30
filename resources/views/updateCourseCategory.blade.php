<html>
<head>
    <title>Welcome to update</title>
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
<form method="post" action="{{url('UpdateCategory')}}">
    <input type="hidden" name="id" value="{{$category->category_id}}">
    Category name      <input type="text" name="category_name" value="{{$category->category_name}}"><br/>


    Created By    <select name="created_by">
        @foreach($users as $ur)
            @if($ur->id == $category->category_id)
                <option value="{{$ur->id}}">{{$ur->username}}</option>
            @else
                <option value="{{$ur->id}}">{{$ur->username}}</option>
            @endif
        @endforeach
    </select><br/>
    Is Active     <select name="active">
        @if($category->is_active==1)
            <option selected value="1">Active</option>
            <option value="0">Not active</option>
        @else
            <option selected value="0">Not active</option>
            <option value="1">Active</option>
        @endif
    </select><br/>

    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <button type="submit">Update</button>
</form>
</body>
</html>