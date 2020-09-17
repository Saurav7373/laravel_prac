@extends('todos/layout')
@section('content')


<div class="container my-3">
    <form method="post" action="{{route('todo.update',$todo->id)}}">
        @csrf
        @method('patch')
        <h2 class="text-2xl">Update this todo list</h2>



        <div class="form-group">
            <x-alert />
            <!-- <label for="text">Email address</label> -->
            <input type="text" name="title" value=" {{$todo->title}}" id="text" placeholder="Enter Todo Title">
        </div>
        <div>
                <textarea name="description" placeholder="Edit description" class="my-3"> {{$todo->description}}</textarea>
            </div>

        <button type="submit" class="btn btn-success">Upate</button>


    </form>
    <a href="/todos" class="btn btn-light my-3">Back</a>
</div>



@endsection