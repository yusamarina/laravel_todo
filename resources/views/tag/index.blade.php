<x-app-layout>
  <div class="flex justify-center text-xl py-6">
    <form action="{{ route('tag.index') }}" method="GET" class="px-64">
      @csrf
        <div class="flex items-center border-b border-teal-700">
          <input type="text" name="keyword" value="{{ $keyword }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
          <input type="submit" value="検索" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-white text-sm border-4 py-1 px-2 rounded">
        </div>
    </form>
  </div>

  <table>
    <div class="flex items-center justify-center">
      <div class="w-full max-w-2xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
          <h5 class="text-xl font-bold leading-none text-gray-900">Tag List</h5>
          <a href="{{ route('tag.index') }}" class="text-sm font-medium text-indigo-700 hover:underline">
            View all
          </a>
        </div>

        @if (count($errors) > 0)
          <div class="flex justify-center pt-6">
            <div class="px-4 py-3 rounded" role="alert">
              <strong class="text-sm text-rose-700">
                <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
              </strong>
            </div>
          </div>
        @endif

        <div class="flow-root">
          <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @if ($items)
              @forelse ($items as $item)
                <li class="py-3 sm:py-4">
                  <div class="flex items-center justify-center space-x-4">
                    <div class="min-w-0 px-6 items-center">
                      <div class="flex">
                        <form action="{{ route('tag.update', $item->id) }}" method="post">
                          @csrf
                          @method('put')
                            <div class="flex items-center pr-3">
                              <p class="text-sm text-gray-900 pr-3">タグ名</p>
                              <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">
                                <div class="flex items-center border-b border-teal-500 pt-3">
                                  <input type="text" name="name" value="{{ $item->name }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="例：掃除">
                                </div>
                              </h3>
                            </div>
                            <div class="inline-flex">
                              <input type="submit" value="更新" class="flex-shrink-0 bg-indigo-900 hover:bg-indigo-700 border-indigo-900 hover:border-indigo-700 text-white text-base border-4 py-1 px-2 rounded">
                            </div>
                        </form>
                        <div class="flex justify-center">
                          <div class="inline-flex text-base font-medium text-gray-900 dark:text-white">
                            <form action="{{ route('tag.destroy', $item->id) }}" method="post" onsubmit="return confirm('削除してもよろしいですか？')" class="px-1">
                              @csrf
                              @method('delete')
                                <input type="submit" value="削除" class="text-base flex-shrink-0 bg-transparent hover:bg-rose-600 border-transparent hover:border-rose-600 border-4 text-indigo-900 hover:text-white py-1 px-2 rounded">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              @empty
                <div class="text-sm text-gray-900 pr-3">タグの登録数：0</div>
              @endforelse
            @endif
          </ul>
        </div>
      </div>
    </div>
  </table>
</x-app-layout>
