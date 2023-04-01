<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>

</head>
<body>
    <h2>List of todo</h2>
    <a href='{{url("todo/create")}}'>Add todo</a>
   <table border="1" width="100%">
       <tr>
           <th>#</th>
           <th>Title</th>
           <th>Description</th>
           <th>Location</th>
           <th>Deadline</th>
           <th>status</th>
           <th>Action</th>

       </tr>
       @foreach($todos as $todo)
       <tr>
           <td>{{$todo->id}}</td>
           <td>{{$todo->title}}</td>
           <td>{{$todo->description}}</td>
           <td>{{$todo->location}}</td>
           <td>{{$todo->deadline}}</td>
           <td>
               <?php $statuses = ["pending","Doing","Done"]?>
               {{$statuses[$todo->status]}}
               
           <!-- @if($todo->status==0)
               Pending
               @elseif($todo->status==1)
               Doing
               @endif -->
           </td>
           <td>
               <a href="{{url("todo/$todo->id/edit")}}">
               <button type="submit">
                   Edit
               </button>
            </a>
               <form action="{{url("todo/$todo->id")}}" method="post" onsubmit="return confirm('Are you sure to delete this todo record?')">
                   @csrf
                   @method("DELETE")
                   <button type="submit">delete</button>
                </form>
            </td>
       </tr>
       @endforeach


   </table>
   {{$todos->links()}}


</body>
</html>