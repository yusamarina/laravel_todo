<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('ToDo List') }}
      </h2>
  </x-slot>

  <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex justify-center py-6">ToDo List</h3>

  <div class="flex justify-center text-xl py-6">
    <form action="{{ route('task_index') }}" method="GET">
      <input type="text" name="keyword" value="{{ $keyword }}">
      <input type="submit" value="検索" class="m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">
    </form>
  </div>

  <table class="flex justify-center text-xl">
    <div class="flex justify-center text-xl py-6">
      <button class="m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">
        <a href="{{ route('task_add') }}">新しいタスクを登録する</a>
      </button>
    </div>
    @forelse ($items as $item)
      @if (old('status', $item->status ? '1' : '0') === "0")
        <div class="mb-8 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12 md:grid-cols-2">
          <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $item->title }}</h3>
              <p class="my-4 font-light">{{ $item->memo }}</p>
            <figcaption class="flex items-center justify-center space-x-3">
              <div class="space-y-0.5 font-medium dark:text-white text-left">
                @if (old('status', $item->status ? '1' : '0') === "1")
                  <label for="status">Status: 完了</label>
                @else
                  <label for="status" class="text-red-600">Status: 未着手</label>
                @endif
                <div class="text-sm font-light text-gray-500 dark:text-gray-400 pb-3">{{ $item->created_at }}</div>
                  <a href="{{ route('task_show', ['id'=>$item->id]) }}" class="m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">詳細</a>
                  <a href="{{ route('task_edit', ['id'=>$item->id]) }}" class="m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">編集</a>
                  <a href="{{ route('task_delete', ['id'=>$item->id]) }}" class="m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">削除</a>
              </div>
            </figcaption>
          </figure>
        </div>
      @endif
    @empty
      <td class="text-xl">タスクを登録してみましょう！</td>
    @endforelse
  </table>
</x-app-layout>
