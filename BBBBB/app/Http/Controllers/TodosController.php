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
    public function show(Todo $todo) //Todo::find($todo)のショートハンド
    {

        return view('todos.show')->with('todo', $todo);
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:5|max:30',
            'description' => 'required'
        ]);
        // dd(request()->all()); formのbodyが取得できる
        $data = request()->all();
        $todo = new Todo(); //インスタンスを作ったら最後にsaveメソッド
        //Model::createメソッドを使う場合はsaveメソッドは不要
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash('success', 'Todoを追加しました！');
        //viewにflashメッセージを表示することができる
        return redirect('/todos');
    }
    public function edit(Todo $todo) //Todo::find($todoId)のショートハンド
    {

        return view('todos.edit')->with('todo', $todo);
    }
    public function update(Todo $todo) //Todo::find($todoId)のショートハンド
    {
        $this->validate(request(), [
            'name' => 'required|min:5|max:30',
            'description' => 'required'
        ]);
        $data = request()->all(); //連想配列


        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();
        session()->flash('success', 'Todoの変更を保存しました！！');

        return redirect('/todos');
    }
    public function destroy(Todo $todo)
    {



        $todo->delete();
        session()->flash('success', 'Todoを削除しました');


        return redirect('/todos');
    }
    public function complete(Todo $todo)
    {
        $todo->completed  = true;
        $todo->save();
        session()->flash('success', 'Todoを完了しました！！');
        return redirect('/todos');
    }
}
