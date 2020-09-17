<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCcreateRequest;
use Laravel\Ui\Presets\React;
use App\Models\Todo;



use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todos.index', compact('todos'));
    }

    public function create()
    {

        return view('todos.create');
    }

    public function store(TodoCcreateRequest $request)
    {
        auth()->user()->todos()->create($request->all());
        // $userId = auth()->id();
        // $request['user_id'] = $userId;
        // Todo::create($request->all());
        return redirect()->back()->with('message', 'Todo Created successfuly');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCcreateRequest $request, Todo $todo)
    {
        $todo->update(['title'=>$request->title]);
        return redirect(route('todos.index'))->with('message','Update Successfull');

    }
    public function complete(Todo $todo)
    {
        $todo->update(['completed'=>true]);
        return redirect()->back()->with('message','Task Marked completed');

    }
    public function incomplete(Todo $todo)
    {
        $todo->update(['completed'=>false]);
        return redirect()->back()->with('message','Task Marked as incompleted');

    }
    public function delete(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('message','Task has been deleted');

    }
    public function show(Todo $todo)
    {
        return view('todos.show',compact('todo'));
    }
}
