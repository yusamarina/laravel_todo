<x-app-layout>
  @if (count($errors) > 0)
  <div class="flex justify-center pt-6">
    <div class="px-4 py-3 rounded" role="alert">
      <strong class="text-sm text-rose-700">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
      </strong>
    </div>
  </div>
  @endif

  <form action="/task/edit" method="post">
    <table>
      @csrf
      <input type="hidden" name="id" value="{{ $task->id }}">
      <div class="py-6 flex items-center justify-center">
        <div class="p-4 w-full max-w-2xl p-4 bg-white rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
          <p class="text-sm text-gray-900">タスク名</p>
          <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">
            <div class="flex items-center border-b border-teal-500 pt-3">
              <input type="text" name="title" value="{{ $task->title }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="例：掃除">
            </div>
          </h3>
            <p class="text-sm text-gray-900 pt-9">メモ</p>
            <p class="font-light">
              <div class="flex items-center border-b border-teal-500 pt-3">
                <textarea rows="5" name="memo" value="{{ $task->memo }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="例：玄関掃除をする。">{{ $task->memo }}</textarea>
              </div>
            </p>
            <p class="text-sm text-gray-900 pt-9">ステータス</p>
            <div class="inline-block relative w-64 pt-3">
              <select name="status" value="{{ $task->status }}" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                @if (old('status', $task->status) === 2)
                  <option value=2>完了</option>
                  <option value=0>未着手</option>
                  <option value=1>進行中</option>
                @elseif (old('status', $task->status) === 1)
                  <option value=1>進行中</option>
                  <option value=0>未着手</option>
                  <option value=2>完了</option>
                @else
                  <option value=0>未着手</option>
                  <option value=1>進行中</option>
                  <option value=2>完了</option>
                @endif
              </select>
            </div>
            <p class="text-sm text-gray-900 pt-9">タグ</p>
            <p class="text-sm text-gray-500">※複数のタグを設定する場合は「、」で区切って入力してください。</p>
            <div class="flex items-center border-b border-teal-500 pt-3">
              <input type="text" name="tag" value="{{ old('tag', $tag ?? null) }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="例：家事、大掃除">
            </div>

            <p class="text-sm text-gray-900 pt-9">期限</p>
            <div class="flex items-center border-b border-teal-500 pt-3">
              <input type="date" name="deadline" value="{{ $task->deadline }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
            </div>
          <figcaption class="flex items-center justify-center space-x-3 pt-6">
            <div class="space-y-0.5 font-medium dark:text-white text-left">
              <div class="flex justify-center">
                <input type="submit" value="保存" class="flex-shrink-0 bg-indigo-900 hover:bg-indigo-700 border-indigo-900 hover:border-indigo-700 text-white text-base border-4 py-1 px-2 rounded">
              </div>
              <div class="pt-6">
                @if (old('status', $task->status) === 2)
                  <a href="{{ route('done_task') }}" class="text-sm font-medium text-indigo-900 hover:underline">
                    完了したタスク一覧へ
                  </a>
                @else
                  <a href="{{ route('task_index') }}" class="text-sm font-medium text-indigo-700 hover:underline">
                    ToDo Listへ
                  </a>
                @endif
              </div>
            </div>
          </figcaption>
        </div>
      </div>
    </table>
  </form>
</x-app-layout>
