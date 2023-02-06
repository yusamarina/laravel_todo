<x-app-layout>
  <div class="flex justify-center text-xl pt-6">
    <form action="{{ route('task_index') }}" method="GET">
      <div class="flex items-center border-b border-teal-700">
        <input type="text" name="keyword" value="{{ $keyword }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
        <input type="submit" value="検索" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-white text-sm border-4 py-1 px-2 rounded">
      </div>
      <div class="flex items-center border-b border-teal-700 pt-6">
        <input type="text"  name="tag_keyword" value="{{ $tag_keyword }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
        <input type="submit" value="タグで検索" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
      </div>
    </form>
  </div>

  <div class="flex justify-center text-xl pt-6">
    <form action="{{route('task_index')}}">
      <button type="submit" name="sort" value="0" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-white text-sm border-4 py-1 px-2 rounded">
        作成日順
      </button>
      <button type="submit" name="sort" value="1" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-white text-sm border-4 py-1 px-2 rounded">
        期限が近い順
      </button>
      <button type="submit" name="sort" value="2" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-white text-sm border-4 py-1 px-2 rounded">
        ステータス順
      </button>
    </form>
  </div>

  <table class="flex justify-center text-xl">
    <div class="flex justify-center text-xl py-12">
      <button class="flex-shrink-0 bg-indigo-900 hover:bg-indigo-700 border-indigo-900 hover:border-indigo-700 text-white text-base border-4 py-1 px-2 rounded">
        <a href="{{ route('task_add') }}">新しいタスクを登録する</a>
      </button>
    </div>

    <div class="flex items-center justify-center">
      <div class="w-full max-w-2xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
          <h5 class="text-xl font-bold leading-none text-gray-900">ToDo List</h5>
          <a href="{{ route('task_index') }}" class="text-sm font-medium text-indigo-700 hover:underline">
            View all
        </a>
        </div>
        <div class="flow-root">
          <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($items as $item)
              @if (old('status', $item->status) !== 2)
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
                        @endif
                      </div>
                    </div>
                    <a href="{{ route('task_show', ['id'=>$item->id]) }}" class="hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500">
                      <div class="min-w-0 px-6 items-center">
                        @if ($item->deadline)
                          @if (($item->deadline) >= $one_week)
                            <div class="text-sm text-gray-900 font-semibold dark:text-gray-400 pb-3">
                              期限：{{ $item->deadline }}
                            </div>
                          @else
                            <div class="text-sm text-rose-400 font-semibold dark:text-gray-400 pb-3">
                              ★期限：{{ $item->deadline }}
                            </div>
                          @endif
                        @endif
                        <p class="text-base font-semibold text-gray-900 truncate dark:text-white">
                          {{ $item->title }}
                        </p>
                        @if ($item->memo)
                          <p class="text-sm text-gray-500 truncate dark:text-gray-400">
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
                    </a>
                  </div>
                  <div class="flex justify-end">
                    <div class="inline-flex text-base font-medium text-gray-900 dark:text-white">
                      <a href="{{ route('task_edit', ['id'=>$item->id]) }}" class="flex-shrink-0 bg-indigo-900 hover:bg-indigo-700 border-indigo-900 hover:border-indigo-700 text-white text-base border-4 py-1 px-2 rounded">編集</a>
                      <form action="/task/delete" method="post" onsubmit="return confirm('削除してもよろしいですか？')" class="px-1">
                        @csrf
                          <input type="hidden" name="id" value="{{ $item->id }}">
                          <input type="submit" value="削除" class="text-base flex-shrink-0 bg-transparent hover:bg-rose-600 border-transparent hover:border-rose-600 border-4 text-indigo-900 hover:text-white py-1 px-2 rounded">
                      </form>
                    </div>
                  </div>
                </li>
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
