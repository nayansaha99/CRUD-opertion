<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Add new todo</h2>
    <p style="color:red">
    @foreach($errors->all() as $error)
    {{$error}}<br/>
    @endforeach
    </p>
    <form action="{{url("todo/$todo->id")}}" method="post">
        @csrf
        @method("PATCH")

    Title <input type="text" name="title"value="{{old('title',$todo->title)}}"><br/>
    Description <textarea name="description"id=""cols="30"rows="10">"{{old("description",$todo->description)}}"</textarea><br/>
    Deadline <input type="date" name="deadline" value="{{old('deadline',$todo->deadline)}}"><br/>
    Location <input type="text" name="location" value ="{{old('location',$todo->location)}}"><br/>
    Status <select name="status">
        <option value="0">Select a status</option>
        <option value="0">Pending</option>
        <option value="1">Doing</option>
        <option value="2">Done</option>

    </select><br/>
    <button>update</button> 




    </form>
</body>
</html>