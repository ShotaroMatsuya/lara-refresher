<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    //
    public function index()
    {

        //fetch all todos from database
        //display them in the todos.index page

        return view('todos.index')->with('todos', Todo::all()); //変数$todosにfetchしたdataが格納される
    }
    public function show($todoId) //routeからパラメータを取得
    {

        return view('todos.show')->with('todo', Todo::find($todoId));
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);
        // dd(request()->all()); formのbodyが取得できる
        $data = request()->all();
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();
        return redirect('/todos');
    }
}
