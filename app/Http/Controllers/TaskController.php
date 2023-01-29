<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Termwind\Components\Raw;
use Validator;

class TaskController extends Controller
{
    public function index (Request $request)
    {
        $items = DB::table('tasks')->orderBy('id', 'desc')->get();
        return view('task.index', ['items' => $items]);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $items = DB::table('tasks')->where('id', '<=', $id)->get();
        return view('task.show', ['items' => $items]);
    }

    public function post(Request $request)
    {
        $items = DB::select('select * from tasks');
        return view('task.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('task.add');
    }

    public function create(Request $request)
    {
        $param = [
            'title' => $request->title,
            'memo' => $request->memo,
        ];
        DB::table('tasks')->insert($param);
        return redirect('/task');
    }

    public function edit(Request $request)
    {
        $item = DB::table('tasks')->where('id', $request->id)->first();
        return view('task.edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'title' => $request->title,
            'memo' => $request->memo,
        ];
        DB::table('tasks')->where('id', $request->id)->update($param);
        return redirect('/task');
    }

    public function del(Request $request)
    {
        $item = DB::table('tasks')->where('id', $request->id)->first();
        return view('task.del', ['form' => $item]);
    }

    public function remove(Request $request)
    {
        DB::table('tasks')->where('id', $request->id)->delete();
        return redirect('/task');
    }
}
