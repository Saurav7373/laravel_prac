@extends('todos/layout')

@section('content')

<div class="container my-3">
    <form method="post" action="/todos/create">
        @csrf
        <h3 class="text-2xl">What do you want in next</h3>

        <div class="form-group">
            <x-alert />
            <!-- <label for="text">Email address</label> -->
            <input type="text" name="title" id="text" placeholder="Enter Todo Title">
            <div>
                <textarea name="description" placeholder="Enter Task description" class="my-3"></textarea>
            </div>
        </div>



        <button type="submit" class="btn btn-success">Create</button>

        <a href="/todos" class="btn btn-light mx-3">Back</a>


    </form>

</div>

@endsection