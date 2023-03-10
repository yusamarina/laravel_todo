<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Termwind\Components\Raw;
use Validator;
use App\Models\Task;
use App\Models\Tag;
use Illuminate\View\View;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index (Request $request)
    {
        $keyword = $request->input('keyword');
        $tags = Tag::all();
        $select_tag = $request->input('select_tag');
        $sort = $request->get('sort');
        $query = Task::query();
        $one_week = new Carbon('+7 day');

        if (!empty($keyword)) {
            $escape_word = addcslashes($keyword, '\\_%');
            $query->where('title', 'LIKE', "%{$escape_word}%");
        }

        if (!empty($select_tag)) {
            $query->whereHas('tags', function ($query) use ($select_tag) {
                $query->where('name', $select_tag);
            });
        }

        if (!empty($sort)) {
            if ($sort === '0') {
                $items = Task::orderBy('created_at')->get();
            } elseif ($sort === '1') {
                $items = Task::orderByRaw('deadline is null asc')->orderBy('deadline')->get();
            } elseif ($sort === '2') {
                $items = Task::orderBy('status')->get();
            }
        } else {
            $items = $query->get();
        }

        return view('task.index', compact('items', 'tags', 'keyword', 'select_tag', 'sort', 'one_week'));
    }

    public function done(Request $request)
    {
        $keyword = $request->input('keyword');
        $tags = Tag::all();
        $select_tag = $request->input('select_tag');
        $sort = $request->get('sort');
        $query = Task::query();

        if (!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }

        if (!empty($select_tag)) {
            $query->whereHas('tags', function ($query) use ($select_tag) {
                $query->where('name', $select_tag);
            });
        }

        if (!empty($sort)) {
            if ($sort === '0') {
                $items = Task::orderBy('created_at')->get();
            } elseif ($sort === '1') {
                $items = Task::orderByRaw('deadline is null asc')->orderBy('deadline')->get();
            }
        } else {
            $items = $query->get();
        }

        return view('task.done', compact('items', 'tags', 'keyword', 'select_tag'));
    }


    public function show($id)
    {
        $item = Task::find($id);
        $one_week = new Carbon('+7 day');

        if (is_null($item)) {
            abort(404);
        }

        return view('task.show', compact('item', 'one_week'));
    }

    public function add(Request $request)
    {
        return view('task.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Task::$rules);
        $this->validate($request, Tag::$rules);
        $task = new Task;
        $form = $request->all();
        unset($form['_token']);
        $task->fill($form)->save();

        $input_tag = $request->get('tag');
        if (isset($input_tag)) {
            $tag_ids = [];
            $tags = explode('???', $input_tag);
            foreach ($tags as $tag) {
                $tag = Tag::updateOrCreate(
                    [
                        'name' => $tag,
                    ]
                );
                $tag_ids[] = $tag->id;
            }
            $task->tags()->sync($tag_ids);
        }

        return redirect('/task');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        $tags = $task->tags->pluck('name')->toArray();

        if (is_null($task)) {
            abort(404);
        }

        return view('task.edit', compact('task'), ['tag' => !empty($tags) ? implode('???', $tags) : null,]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Task::$rules);
        $this->validate($request, Tag::$rules);
        $task = Task::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $task->fill($form)->save();

        $input_tag = $request->get('tag');
        if (isset($input_tag)) {
            $tag_ids = [];
            $tags = explode('???', $input_tag);
            foreach ($tags as $tag) {
                $tag = Tag::updateOrCreate(
                    [
                        'name' => $tag,
                    ]
                );
                $tag_ids[] = $tag->id;
            }
            $task->tags()->sync($tag_ids);
        }

        return redirect('/task');
    }

    public function delete($id)
    {
        $task = Task::find($id);

        if (is_null($task)) {
            abort(404);
        }

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
