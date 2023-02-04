<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Delete ToDo') }}
      </h2>
  </x-slot>

  <form action="/task/delete" method="post">
    <table>
      @csrf
      <input type="hidden" name="id" value="{{ $task->id }}">
        <div class="flex items-center justify-center pt-12">
          <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
              <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">ToDo</h5>
              @if (old('status', $task->status) === 2)
                <a href="{{ route('done_task') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                  完了したタスク一覧へ
                </a>
              @else
                <a href="{{ route('task_index') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                  タスク一覧へ
                </a>
              @endif
            </div>
            <div class="flow-root">
              <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                <li class="py-3 sm:py-4">
                  <div class="flex items-center space-x-4">
                    <div class="flex items-center justify-center">
                      <div class="flex-shrink-0 px-6">
                        <img class="w-8 h-8 rounded-full" src="{{ asset('img/todo.png') }}" alt="image">
                        <div class="text-sm font-light pb-3">
                          @if (old('status', $task->status) === 0)
                            <label for="status" class="text-red-600 font-semibold">未着手</label>
                          @elseif (old('status', $task->status) === 1)
                            <label for="status" class="text-blue-600 font-semibold">進行中</label>
                          @else
                            <label for="status" class="font-semibold">完了</label>
                          @endif
                        </div>
                      </div>
                      <div class="min-w-0 px-6 items-center">
                        <p class="text-base font-medium text-gray-900 truncate dark:text-white">
                          {{ $task->title }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                          {{ $task->memo }}
                        </p>
                        <div class="text-sm font-light text-gray-500 dark:text-gray-400">
                          {{ $task->created_at->format('Y/m/d') }}
                        </div>
                      </div>
                    </div>
                    <div class="inline-flex items-center text-base font-medium text-gray-900 dark:text-white text-right">
                      <div class="text-right">
                        <input type="submit" value="削除" class="text-base flex-shrink-0 bg-transparent hover:bg-pink-700 border-transparent hover:border-pink-700 text-sm border-4 text-teal-500 hover:text-white py-1 px-2 rounded">
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

      {{-- <input type="hidden" name="id" value="{{ $task->id }}">
      <div class="max-w-sm w-full lg:max-w-full lg:flex justify-center text-2xl py-6">
        @if (old('status', $task->status) === 0)
          <div class="p-4 sm:p-8 bg-red-100 shadow sm:rounded-lg">
        @elseif (old('status', $task->status) === 1)
          <div class="p-4 sm:p-8 bg-blue-100 shadow sm:rounded-lg">
        @else
          <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        @endif
        <div class="space-y-0.5 font-medium dark:text-white text-left pb-3 text-base">
          @if (old('status', $task->status) === 0)
            <label for="status" class="text-red-600 font-semibold">未着手</label>
          @elseif (old('status', $task->status) === 1)
            <label for="status" class="text-blue-600 font-semibold">進行中</label>
          @else
            <label for="status" class="font-semibold">完了</label>
          @endif
        </div>
          <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $task->title }}</h3>
            <p class="text-base my-4 font-light">{{ $task->memo }}</p>
        <div class="text-sm font-light text-gray-500 dark:text-gray-400 pb-3">
          {{ $task->created_at->format('Y/m/d') }}
        </div>
          <figcaption class="space-x-3">
            <div class="pt-6 flex justify-center">
              <input type="submit" value="削除" class="text-base m-1 bg-pink-100 hover:bg-pink-200 text-blue-900 py-2 px-10 border border-blue-900 rounded-full shadow">
            </div> --}}
            {{-- <div class="pt-3 flex justify-center">
              @if (old('status', $task->status) === 2)
                <a href="{{ route('done_task') }}" class="text-base m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-10 border border-blue-900 rounded-full shadow">Doneページへ</a>
              @else
                <a href="{{ route('task_index') }}" class="text-base m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-10 border border-blue-900 rounded-full shadow">ToDo Listへ</a>
              @endif
            </div>
          </figcaption>
        </figure>
      </div> --}}
    </table>
  </form>
</x-app-layout>
