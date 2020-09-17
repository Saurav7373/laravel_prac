@extends('todos/layout')

@section('content')

<div class="container my-3">
    <form method="post" action="/todos/create">
        @csrf
        <h3 class="text-2xl">{{$todo->title}}</h3>
        </h3>

        <div>
            <div>
                <b>
                    <p>{{$todo->description}}</p>
                </b>
            </div>
        </div>

        <a href="/todos" class="btn btn-light mx-3">Back</a>
    </form>

</div>

@endsection