<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('ToDo List') }}
      </h2>
  </x-slot>

  <h3 class="text-4xl font-semibold text-gray-900 dark:text-white flex justify-center py-6">
    ToDo List
  </h3>

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
    <div class="flex flex-wrap items-center justify-center">
      @forelse ($items as $item)
        @if (old('status', $item->status) !== 2)
          <div class="py-6 ">
            <div class="sm:px-6 lg:px-8 space-y-6">
              @if (old('status', $item->status) === 0)
                <div class="p-4 sm:p-8 bg-red-100 shadow sm:rounded-lg">
              @elseif (old('status', $item->status) === 1)
                <div class="p-4 sm:p-8 bg-blue-100 shadow sm:rounded-lg">
              @endif
                <div class="text-sm font-light text-gray-500 dark:text-gray-400 pb-3">{{ $item->created_at }}</div>
                  <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $item->title }}</h3>
                    <p class="text-base my-4 font-light">{{ $item->memo }}</p>
                <figcaption class="flex items-center justify-center space-x-3">
                  <div class="space-y-0.5 font-medium dark:text-white text-left">
                    @if (old('status', $item->status) === 0)
                      <label for="status" class="text-red-600">Status: 未着手</label>
                    @elseif (old('status', $item->status) === 1)
                      <label for="status" class="text-blue-600">Status: 進行中</label>
                    @endif
                    <a href="{{ route('task_show', ['id'=>$item->id]) }}" class="text-base m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">詳細</a>
                    <a href="{{ route('task_edit', ['id'=>$item->id]) }}" class="text-base m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">編集</a>
                    <a href="{{ route('task_delete', ['id'=>$item->id]) }}" class="text-base m-1 bg-pink-100 hover:bg-pink-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">削除</a>
                  </div>
                </figcaption>
              </div>
            </div>
          </div>
        @endif
      @empty
        <td class="text-xl">タスクを登録してみましょう！</td>
      @endforelse
    </div>
  </table>
</x-app-layout>
