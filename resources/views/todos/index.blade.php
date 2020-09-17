@extends('todos/layout')

@section('content')
<style>
    ul {
        display: table;
        margin: 0 auto;
    }

    h4 {
        margin: 0;
        display: inline-block;

    }

    p {
        /* margin: 0; */
        display: inline-block;
    }



    div.absolute {
        position: absolute;
        top: 50px;
        right: 600px;


        border: 3px solid grey;
    }

    div.absolute {
        padding: 1em;
        margin: 0 -1em;
        border-bottom: 3px solid grey;
    }

    hr {
        border: 2px solid grey;
        border-radius: 1px;
    }
</style>

<div class="absolute">
    <!-- <center> -->
    <h4 class="my-4 ">All my todos are here</h4>

    <a href="/todos/create" class="btn btn-primary mx-3 ">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
        </svg>
    </a>
    <hr color="green" size="10">
    <x-alert />
    <ul>
        @forelse($todos as $todo)

        <p>
            <div>
                @if($todo->completed)
                <p> <del>{{$todo->title}}</del></p>

                @else
                <a class='my-2'href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a>

                @endif
                <a href="{{'/todos/'.$todo->id.'/edit'}}" class="btn btn-outline-warning border-warning"><span class="glyphicon glyphicon-edit"></a>
                @if($todo->completed)

                <span onclick="event.preventDefault();document.getElementById('form-incomplete-{{$todo->id}}').submit()" class="glyphicon btn btn-outline-success my-2 my-sm-0">&#xe013;</span>
                <form style="display: none;" method="post" id="{{'form-incomplete-'.$todo->id}}" action="{{route('todo.incomplete',$todo->id)}}">
                    @csrf
                    @method('delete')
                </form>
                <form style="display: none;" method="post" id="{{'form-delete-'.$todo->id}}" action="{{route('todo.delete',$todo->id)}}">
                    @csrf
                    @method('delete')
                </form>
                <span onclick="event.preventDefault();
                
                if(confirm('Are you really want to delete this task?'))
                document.getElementById('form-delete-{{$todo->id}}').submit()" class="glyphicon btn btn-outline-dark my-2 my-sm-0">
                    <svg width="1em" color="red" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"></path>
                    </svg>
                </span>


                @else
                <span onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit()" class="glyphicon btn btn-outline-dark my-2 my-sm-0">&#xe013;</span>

                <form style="display: none;" method="post" id="{{'form-complete-'.$todo->id}}" action="{{route('todo.complete',$todo->id)}}">
                    @csrf
                    @method('put')
                </form>
                <form style="display: none;" method="post" id="{{'form-delete-'.$todo->id}}" action="{{route('todo.delete',$todo->id)}}">
                    @csrf
                    @method('delete')
                </form>
                <span onclick="event.preventDefault();
                 if(confirm('Are you really want to delete this task?'))
                document.getElementById('form-delete-{{$todo->id}}').submit()" class="glyphicon btn btn-outline-dark my-2 my-sm-0">
                    <svg width="1em" color="red" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"></path>
                    </svg>
                </span>

                @endif

            </div>
        </p>
        @empty
        <p>No task avilabe ,create one.</p>

        @endforelse

    </ul>

</div>

@endsection