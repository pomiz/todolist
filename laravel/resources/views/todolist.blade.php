<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

    <div class="container vh-100">
        <div class="row h-100">
            <div class="col-11 col-md-8 col-lg-6 mx-auto my-auto shadow-lg p-5">
                <h1 class="text-center">Todolist</h1>

                <form action="/todo/add" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="todo" type="text" class="form-control" placeholder="What do you want to do?">
                        <button class="btn btn-primary" type="submit">save</button>
                    </div>
                </form>

                <ul class="list-group list-group-flush overflow-auto" style="max-height : 350px;">

                    @foreach($todos as $todo)

                        <li class="list-group-item d-flex justify-content-between {{ ($todo->status)? 'list-group-item-success' : '' }}">
                            <a class="btn btn-light" href="/todo/delete/{{ $todo->id }}">
                                <i class="bi-x-lg"></i>
                            </a>

                            @if ($todo->status)
                                <del>{{ $todo->todo }}</del>
                            @else
                                {{ $todo->todo }}
                            @endif
                            
                            <a class="btn btn-light" href="/todo/update/{{ $todo->id }}">
                                <i class="bi-{{ ($todo->status)? 'arrow-counterclockwise' : 'check-lg' }}"></i>
                            </a>
                        </li>
                    
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>