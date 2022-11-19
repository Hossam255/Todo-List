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
<h1>Hello, world</h1>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>