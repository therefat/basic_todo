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
}
