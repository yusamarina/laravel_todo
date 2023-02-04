<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit ToDo') }}
      </h2>
  </x-slot>

  @if (count($errors) > 0)
  <div class="flex justify-center text-xl pt-6">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
      <strong class="font-bold">
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
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex flex-col items-center justify-center">
          @if (old('status', $task->status) === 0)
            <div class="p-4 sm:p-8 bg-red-100 shadow sm:rounded-lg">
          @elseif (old('status', $task->status) === 1)
            <div class="p-4 sm:p-8 bg-blue-100 shadow sm:rounded-lg">
          @else
              <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          @endif
            <div class="text-sm font-light text-gray-500 dark:text-gray-900 pb-3">{{ $task->created_at->format('Y/m/d') }}</div>
              <p class="text-sm text-gray-900">タスク名</p>
              <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">
                <div class="flex items-center border-b border-teal-500 pt-3">
                  <input type="text" name="title" value="{{ $task->title }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
                </div>
              </h3>
                <p class="text-sm text-gray-900 pt-9">メモ</p>
                <p class="font-light">
                  <div class="flex items-center border-b border-teal-500 pt-3">
                    <input type="text" name="memo" value="{{ $task->memo }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
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
                <p class="text-sm text-gray-900 pt-9">期限</p>
                <div class="flex items-center border-b border-teal-500 pt-3">
                  <input type="date" name="deadline" value="{{ $task->deadline }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="玄関掃除をする。">
                </div>
              <figcaption class="flex items-center justify-center space-x-3 pt-6">
                <div class="space-y-0.5 font-medium dark:text-white text-left">
                  <div class="flex justify-center">
                    <input type="submit" value="保存" class="text-base flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
                  </div>
                  <div class="pt-6">
                    @if (old('status', $task->status) === 2)
                      <a href="{{ route('done_task') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        完了したタスク一覧へ
                      </a>
                    @else
                      <a href="{{ route('done_task') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        ToDo Listへ
                      </a>
                    @endif
                  </div>
                </div>
              </figcaption>
          </div>
        </div>
      </div>
    </table>
  </form>
</x-app-layout>
