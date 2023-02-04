<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('ToDo List') }}
      </h2>
  </x-slot>

  <div class="flex justify-center text-xl pt-6">
    <form action="{{ route('task_index') }}" method="GET">
      <div class="flex items-center border-b border-teal-500">
        <input type="text" name="keyword" value="{{ $keyword }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
        <input type="submit" value="検索" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
      </div>
    </form>
  </div>

  <div class="flex justify-center text-xl pt-6">
    <form action="{{route('task_index')}}">
      <button type="submit" name="sort" value="0" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
        作成日順
      </button>
      <button type="submit" name="sort" value="1" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
        作成日が新しい順
      </button>
      <button type="submit" name="sort" value="2" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
        ステータス順
      </button>
    </form>
  </div>

  <table class="flex justify-center text-xl">
    <div class="flex justify-center text-xl py-12">
      <button class="text-base flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
        <a href="{{ route('task_add') }}">新しいタスクを登録する</a>
      </button>
    </div>

    <div class="flex items-center justify-center">
      <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
          <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">ToDo List</h5>
          <a href="{{ route('task_index') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
            View all
        </a>
        </div>

        <div class="flow-root">
          <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($items as $item)
              @if (old('status', $item->status) !== 2)
                <a href="{{ route('task_show', ['id'=>$item->id]) }}" class="hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500">
                  <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">
                      <div class="flex items-center justify-center">
                        <div class="flex-shrink-0 px-6">
                          <img src="{{ asset('img/todo.png') }}" class="w-8 h-8 rounded-full" alt="image">
                          <div class="text-sm font-light pb-3">
                            @if (old('status', $item->status) === 0)
                              <label for="status" class="text-red-600 font-semibold">未着手</label>
                            @elseif (old('status', $item->status) === 1)
                              <label for="status" class="text-blue-600 font-semibold">進行中</label>
                            @endif
                          </div>
                        </div>
                        <div class="min-w-0 px-6 items-center">
                          <p class="text-base font-medium text-gray-900 truncate dark:text-white">
                            {{ $item->title }}
                          </p>
                          <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{ $item->memo }}
                          </p>
                          <div class="text-sm font-light text-gray-500 dark:text-gray-400">
                            {{ $item->created_at->format('Y/m/d') }}
                          </div>
                        </div>
                      </div>
                      <div class="inline-flex items-center text-base font-medium text-gray-900 dark:text-white text-right">
                        <div class="text-right flex justify-center">
                          <a href="{{ route('task_edit', ['id'=>$item->id]) }}" class="text-base flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">編集</a>
                          <form action="/task/delete" method="post" onsubmit="return confirm('削除してもよろしいですか？')">
                            @csrf
                              <input type="hidden" name="id" value="{{ $item->id }}">
                              <input type="submit" value="削除" class="text-base flex-shrink-0 bg-transparent hover:bg-pink-700 border-transparent hover:border-pink-700 text-sm border-4 text-teal-500 hover:text-white py-1 px-2 rounded">
                          </form>
                        </div>
                      </div>
                    </div>
                  </li>
                </a>
              @endif
            @empty
              <div class="text-xl">タスクを登録してみましょう！</div>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </table>
</x-app-layout>
