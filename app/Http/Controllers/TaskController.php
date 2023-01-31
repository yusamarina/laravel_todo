<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Termwind\Components\Raw;
use Validator;
use App\Models\Task;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index (Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Task::query();

        if (!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }

        $items = $query->get();
        return view('task.index', compact('items', 'keyword'));
    }

    public function show($id)
    {
        $item = Task::find($id);
        return view('task.show', compact('item'));
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

    public function edit($id)
    {
        $task = Task::find($id);
        return view('task.edit', compact('task'));
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

    public function delete($id)
    {
        $task = Task::find($id);
        return view('task.delete', compact('task'));
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
