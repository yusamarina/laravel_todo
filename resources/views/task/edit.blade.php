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
        <div class="max-w-sm w-full lg:max-w-full lg:flex justify-center text-2xl py-6 ">
          <figure class="bg-gray-300 flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700">
            <div class="text-sm font-light text-gray-500 dark:text-gray-900 pb-3">{{ $task->created_at }}</div>
            <p class="text-sm text-gray-900">タスク名</p>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white"><input type="string" name="title" value="{{ $task->title }}"></h3>
              <p class="text-sm text-gray-900 pt-4">メモ</p>
              <p class="mb-4 font-light"><input type="text" name="memo" value="{{ $task->memo }}"></p>
              <select class="form-control" name="status" value="{{ $task->status }}">
                @if (old('status', $task->status ? '1' : '0') === "1")
                  <option value={{ $task->status }}>完了</option>
                  <option value=0>未着手</option>
                @else
                  <option value={{ $task->status }}>未着手</option>
                  <option value=1>完了</option>
                @endif
              </select>
            <figcaption class="flex items-center justify-center space-x-3 pt-6">
              <div class="space-y-0.5 font-medium dark:text-white text-left">
                <div class="flex justify-center">
                  <input type="submit" value="保存" class="text-base m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">
                </div>
                <div class="pt-6">
                  <a href="{{ route('task_index') }}" class="m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-10 border border-blue-900 rounded-full shadow">ToDo Listへ</a>
                </div>
              </div>
            </figcaption>
          </figure>
        </div>
    </table>
  </form>
</x-app-layout>
