<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('ToDo') }}
      </h2>
  </x-slot>

  <table>
    <div class="flex items-center justify-center pt-12">
      <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
          <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">ToDo</h5>
          @if (old('status', $item->status) === 2)
            <a href="{{ route('done_task') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
              完了したタスク一覧へ
            </a>
          @else
            <a href="{{ route('task_index') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
              ToDo Listへ
            </a>
          @endif
        </div>

        <div class="flow-root">
          <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
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
                      @else
                        <label for="status" class="font-semibold">完了</label>
                      @endif
                    </div>
                  </div>
                  <div class="min-w-0 px-6 items-center">
                    @if (old('status', $item->status) !== 2)
                      <p class="text-base font-medium text-gray-900 truncate dark:text-white">
                        {{ $item->title }}
                      </p>
                    @else
                      <p class="line-through decoration-gray-500 text-base font-medium text-gray-900 truncate dark:text-white">
                        {{ $item->title }}
                      </p>
                    @endif
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
          </ul>
        </div>
      </div>
    </div>
  </table>
</x-app-layout>
