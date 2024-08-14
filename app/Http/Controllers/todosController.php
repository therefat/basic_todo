<?php

namespace App\Http\Controllers;

use App\Models\todos;
use Illuminate\Http\Request;

class todosController extends Controller
{
    //
    public function index(){
        $todos = todos::all();
        $data = compact('todos');
        return view('welcome', $data);
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'work'=>'required',
            'duedate'=>'required',
        ]);
        $todo = new todos();
        $todo->name= $request->input('name');
        $todo->work= $request->input('work');
        $todo->duedate = $request->input('duedate');
        $todo->save();
        return redirect()->route('todo.home');
    }
    public function delete($id)
    {
             todos::find($id)->delete();
             return redirect()->route('todo.home');
    }
    public function edit($id){
        $todo =todos::find($id);
        $data = compact('todo');
        return view('update', $data);
    }
    public function updateData(Request $request){
        $request->validate([
            'name'=>'required',
            'work'=>'required',
            'duedate'=>'required',
        ])    ;
        $id = $request['id'];
        $todo = todos::find($id);
        $todo->name= $request->input('name');
        $todo->work= $request->input('work');
        $todo->duedate = $request->input('duedate');
        $todo->save();
        return redirect()->route('todo.home');

    }
}
