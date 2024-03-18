<?php
    //print_r($projectList);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
</head>
<body>

@foreach ($projectList as $project)
    <li class="list-group-item">
        <strong>{{$project->name}}</strong>
        <span class="float-end">
            <a type="button" class="btn btn-outline-info" href="project/{{$project->id}}">
                Dettagli
            </a>
        </span>
        <form method="post" action="/project/{{$project->id}}">
            @csrf
            @method('DELETE')
            <button type="submit">
                Cancella
            </button>
        </form>

        @if(count($project->projectTasks) > 0)
            <ul>
            @foreach ($project->projectTasks as $task)
                <li>
                    {{$task->name}}
                </li>
            @endforeach
            </ul>
        @else
            <li>There are no tasks in this project!</li>
        @endif
    </li>
@endforeach

</body>
</html>
