<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel='stylesheet'/> 
    <title>Todo List</title>
</head>
<body>


<div class="text-center mt-5" >
    <h2>Add Todo</h2>
    <form class="row g-3 justify-content-center" method="POST" action="{{route('todos.store')}}">
        @csrf
        <div class="col-6">
            <input type="text" class="form-control" name="title" placeholder="Title">
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">submit</button>
        </div>
    </form>
</div>

<div class="text-center">
    <h2> All Todos</h2>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $counter=1 @endphp

                @foreach($todos as $todo)
                <tr>
                    <th>{{$counter}}</th>
                    <td>{{$todo->title}}</td>
                    <td>{{$todo->created_at}}</td>
                    <td>
                        @if($todo->is_completed)
                        <div class="badge bg-success">Completed</div>
                        @else
                        <div class="badge bg-warning">Not Completed</div>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('todos.edit',['todo'=>$todo->id])}}" class="btn btn-info">Edit</a>
                        <form style="display: inline" action="{{route('todos.destroy',['todo'=>$todo->id])}}" method="POST"> 
                                        @csrf
                                        @method('delete')  
                                        <button class="btn btn-danger ">
                                        delete
                                        </button>
                                    </form> 
                    </td>

                </tr>
                @php $counter++; @endphp
                @endforeach
            </tbody>
        </table>        
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>