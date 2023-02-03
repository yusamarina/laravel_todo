<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('ToDo') }}
      </h2>
  </x-slot>

  <table>
    <div class="flex flex-wrap items-center justify-center">
      <div class="py-6 ">
        <div class="sm:px-6 lg:px-8 space-y-6">
          @if (old('status', $item->status) === 0)
            <div class="p-4 sm:p-8 bg-red-100 shadow sm:rounded-lg">
          @elseif (old('status', $item->status) === 1)
            <div class="p-4 sm:p-8 bg-blue-100 shadow sm:rounded-lg">
          @else
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          @endif
          <div class="text-sm font-light text-gray-500 dark:text-gray-400 pb-3">{{ $item->created_at->format('Y/m/d') }}</div>
            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $item->title }}</h3>
              <p class="text-base my-4 font-light">{{ $item->memo }}</p>
          <figcaption class="flex items-center justify-center space-x-3">
            <div class="space-y-0.5 font-medium dark:text-white text-left">
              @if (old('status', $item->status) === 0)
                <label for="status" class="text-red-600">Status: 未着手</label>
              @elseif (old('status', $item->status) === 1)
                <label for="status" class="text-blue-600">Status: 進行中</label>
              @else
                <label for="status">Status: 完了</label>
              @endif
              <a href="{{ route('task_edit', ['id'=>$item->id]) }}" class="text-base m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">編集</a>
              <a href="{{ route('task_delete', ['id'=>$item->id]) }}" class="text-base m-1 bg-pink-100 hover:bg-pink-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">削除</a>
              <div class="pt-6 flex justify-center">
                @if (old('status', $item->status) === 2)
                  <a href="{{ route('done_task') }}" class="m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-10 border border-blue-900 rounded-full shadow">Doneページへ</a>
                @else
                  <a href="{{ route('task_index') }}" class="m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-10 border border-blue-900 rounded-full shadow">ToDo Listへ</a>
                @endif
              </div>
            </div>
          </figcaption>
        </div>
      </div>
    </div>
  </table>
</x-app-layout>
