<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Termwind\Components\Raw;
use Validator;
use App\Models\Task;

class TaskController extends Controller
{
    public function index (Request $request)
    {
        $items = Task::all();
        return view('task.index', ['items' => $items]);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $items = DB::table('tasks')->where('id', '<=', $id)->get();
        return view('task.show', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('task.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Task::$rules);
        $task = new Task;
        $form = $request->all();
        unset($form['_token']);
        $task->fill($form)->save();
        return redirect('/task');
    }

    public function edit(Request $request)
    {
        $task =Task::find($request->id);
        return view('task.edit',['form' => $task]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Task::$rules);
        $task = Task::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $task->fill($form)->save();
        return redirect('/task');
    }

    public function delete(Request $request)
    {
        $task = Task::find($request->id);
        return view('task.delete', ['form' => $task]);
    }

    public function remove(Request $request)
    {
        Task::find($request->id)->delete();
        return redirect('/task');
    }

    public function find(Request $request)
    {
        return view('task.find', ['input' => '']);
    }

    public function search(Request $request)
    {
        $item = Task::titleEqual($request->input)->first();
        $param = ['input' => $request->input, 'item' => $item];
        return view('task.find', $param);
    }
}
