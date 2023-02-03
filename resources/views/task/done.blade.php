<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Done') }}
      </h2>
  </x-slot>

  <div class="flex justify-center text-xl py-6">
    <form action="{{ route('task_index') }}" method="GET">
      <div class="flex items-center border-b border-teal-500 py-2">
        <input type="text" name="keyword" value="{{ $keyword }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
        <input type="submit" value="検索" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
      </div>
    </form>
  </div>

  <table class="flex justify-center text-xl">
    <div class="flex justify-center text-xl py-3">
      <button class="text-base flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
        <a href="{{ route('task_add') }}">新しいタスクを登録する</a>
      </button>
    </div>
    <div class="flex flex-wrap items-center justify-center width: 100%">
      @forelse ($items as $item)
        @if (old('status', $item->status) === 2)
          <a href="{{ route('task_show', ['id'=>$item->id]) }}">
            <div class="py-6">
              <div class="sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                  <div class="text-sm font-light pb-3">
                    <label for="status" class="font-semibold">完了</label>
                  </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $item->title }}</h3>
                      <p class="text-sm my-4 font-light">{{ $item->memo }}</p>
                  <div class="text-sm font-light text-gray-500 dark:text-gray-400 pb-6">
                    {{ $item->created_at->format('Y/m/d') }}
                  </div>
                  <figcaption class="flex items-center justify-center space-x-3">
                    <div class="space-y-0.5 font-medium dark:text-white text-left">
                      <a href="{{ route('task_edit', ['id'=>$item->id]) }}" class="text-base m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">編集</a>
                      <a href="{{ route('task_delete', ['id'=>$item->id]) }}" class="text-base m-1 bg-pink-100 hover:bg-pink-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">削除</a>
                    </div>
                  </figcaption>
                </div>
              </div>
            </div>
          </a>
        @endif
      @empty
        <td class="text-xl">タスクが見つかりませんでした。</td>
      @endforelse
    </div>
  </table>
</x-app-layout>
