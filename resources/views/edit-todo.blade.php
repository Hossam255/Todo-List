<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit  List</title>
</head>
<body>

<div class="text-center mt-5">
    <h2>Edit Todo</h2>
</div>

<form class="row g-3 justify-content-center" method="POST" action="{{route('todos.update',['todo'=>$todo->id])}}">
        @csrf
        {{method_field('PUT')}}
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title" value="{{$todo->title}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="is_completed" class="form-control" >
                    <option value="1" @if($todo->is_completed==1) selected @endif>Complete</option>
                    <option value="0" @if($todo->is_completed==0) selected @endif>Not Complete</option>
                </select>
            </div>
        </div>

        <div class="col-auto mt-5">
            <button type="submit" class="btn btn-primary mb-3">submit</button>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>