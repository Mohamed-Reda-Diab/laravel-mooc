<html>
<head>
    <title>Welcome to Update</title>
</head>
<body>
<h1>update ate</h1>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif
<form method="post" action="{{url('updateRate')}}">
                 <input type="hidden" name="rate_id" value="{{$rate->rate_id}}"><br>

    student    <select name="student_id">
        @foreach($users as $user)
            @if($user->id == $rate->student_id)
                <option selected value="{{$user->id}}">{{$user->username}}</option>
            @else
                <option value="{{$user->id}}">{{$user->username}}</option>
            @endif
        @endforeach
    </select><br/>


    Course    <select name="course_id">
        @foreach($courses as $course)
            @if($course->course_id == $rate->course_id)
                <option selected value="{{$course->course_id}}">{{$course->course_name}}</option>
            @else
                <option value="{{$course->course_id}}">{{$course->course_name}}</option>
            @endif
        @endforeach
    </select><br/>

    rate:-
            <select name="rate">
                @for($c=1;$c<=5;$c++)
                    @if($c==$rate->rate)
                <option selected value="{{$c}}">{{$c}}</option>
                    @else
                <option value="{{$c}}">{{$c}}</option>
                    @endif
               @endfor
            </select><br/>

    Comment:-        <textarea  cols="200" rows="5" name="rate_comment" >
                         {{$rate->rate_comment}}
                 </textarea><br/>

    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <button type="submit">Update</button>
</form>
</body>
</html>