<x-app-layout>
  <table>
    <div class="flex items-center justify-center pt-12">
      <div class="w-full max-w-2xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
          <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">ToDo</h5>
          @if (old('status', $item->status) === 2)
            <a href="{{ route('done_task') }}" class="text-sm font-medium text-indigo-700 hover:underline">
              完了したタスク一覧へ
            </a>
          @else
            <a href="{{ route('task_index') }}" class="text-sm font-medium text-indigo-700 hover:underline">
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
                    @if (old('status', $item->status) === 0)
                      <img src="{{ asset('img/not_started.png') }}" class="h-9" alt="image">
                      <div class="text-sm font-light py-3 flex items-center justify-center">
                        <label for="status" class="text-rose-400 font-semibold">未着手</label>
                      </div>
                    @elseif (old('status', $item->status) === 1)
                      <img src="{{ asset('img/progression.png') }}" class="h-9" alt="image">
                      <div class="text-sm font-light py-3 flex items-center justify-center">
                        <label for="status" class="text-teal-500 font-semibold">進行中</label>
                      </div>
                    @else
                      <img src="{{ asset('img/todo.png') }}" class="h-12" alt="image">
                      <div class="text-sm text-gray-900 font-light py-3 flex items-center justify-center">
                        <label for="status" class="font-semibold">完了</label>
                      </div>
                    @endif
                  </div>
                  <div class="min-w-0 px-6 items-center">
                    @if ($item->deadline)
                      @if (old('status', $item->status) !== 2)
                        @if (($item->deadline) >= $one_week)
                          <div class="text-sm text-gray-900 font-semibold dark:text-gray-400 pb-3">
                            期限：{{ $item->deadline }}
                          </div>
                        @else
                          <div class="text-sm text-rose-400 font-semibold dark:text-gray-400 pb-3">
                            ★期限：{{ $item->deadline }}
                          </div>
                        @endif
                      @else
                        <div class="text-sm font-light text-gray-500 dark:text-gray-400 pb-3">
                          期限：{{ $item->deadline }}
                        </div>
                      @endif
                    @else
                      <div class="text-sm font-light text-gray-500 dark:text-gray-400 pb-3">
                        期限：設定なし
                      </div>
                    @endif
                    @if (old('status', $item->status) !== 2)
                      <p class="text-base font-semibold text-gray-900 truncate dark:text-white">
                        {{ $item->title }}
                      </p>
                      <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        {!!nl2br(e($item->memo))!!}
                      </p>
                    @else
                      <p class="line-through decoration-gray-500 text-base font-semibold text-gray-900 truncate dark:text-white">
                        {{ $item->title }}
                      </p>
                      <p class="line-through decoration-gray-500 text-sm text-gray-500 truncate dark:text-gray-400">
                        {!!nl2br(e($item->memo))!!}
                      </p>
                    @endif

                    @if ($item->tags()->exists())
                      <div class="flex">
                        @foreach ($item->tags as $tag)
                          <p class="text-sm text-teal-500 truncate dark:text-gray-400 pt-3 pr-3">
                            # {{$tag->name}}
                          </p>
                        @endforeach
                      </div>
                    @endif
                  </div>
                </div>
              </div>
              <div class="flex justify-end">
                <div class="inline-flex items-center text-base font-medium text-gray-900 dark:text-white text-right">
                  <div class="text-right flex justify-center">
                    <a href="{{ route('task_edit', ['id'=>$item->id]) }}" class="flex-shrink-0 bg-indigo-900 hover:bg-indigo-700 border-indigo-900 hover:border-indigo-700 text-white text-base border-4 py-1 px-2 rounded">編集</a>
                    <form action="/task/delete" method="post" onsubmit="return confirm('削除してもよろしいですか？')" class="px-1">
                      @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <input type="submit" value="削除" class="text-base flex-shrink-0 bg-transparent hover:bg-rose-600 border-transparent hover:border-rose-600 border-4 text-indigo-900 hover:text-white py-1 px-2 rounded">
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
