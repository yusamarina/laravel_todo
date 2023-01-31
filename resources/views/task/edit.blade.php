<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit ToDo') }}
      </h2>
  </x-slot>

  @if (count($errors) > 0)
  <div>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form action="/task/edit" method="post">
    <table>
      @csrf
      <input type="hidden" name="id" value="{{ $task->id }}">
        <div class="mb-8 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12 md:grid-cols-2">
          <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white"><input type="string" name="title" value="{{ $task->title }}"></h3>
              <p class="my-4 font-light"><input type="text" name="memo" value="{{ $task->memo }}"></p>
              <select class="form-control" name="status" value="{{ $task->status }}">
                <option value=0>これからやる</option>
                <option value=1>実行済み！</option>
              </select>
            <figcaption class="flex items-center justify-center space-x-3">
              <div class="space-y-0.5 font-medium dark:text-white text-left">
                <div class="text-sm font-light text-gray-500 dark:text-gray-400 pb-3">{{ $task->created_at }}</div>
                <input type="submit" value="保存" class="m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">
                <a href="{{ route('task_index') }}" class="m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-10 border border-blue-900 rounded-full shadow">ToDo Listへ</a>
              </div>
            </figcaption>
          </figure>
        </div>
    </table>
  </form>
</x-app-layout>
