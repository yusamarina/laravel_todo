<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('ToDo') }}
      </h2>
  </x-slot>

  <div class="max-w-sm w-full lg:max-w-full lg:flex justify-center text-2xl py-6">
    <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700">
      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $item->title }}</h3>
        <p class="text-xl my-4 font-light">Memo: {{ $item->memo }}</p>
      <figcaption class="flex items-center justify-center space-x-3">
        <div class="text-xl space-y-0.5 font-medium dark:text-white text-left">
          @if (old('status', $item->status ? '1' : '0') === "1")
            <label for="status">Status: 完了</label>
          @else
            <label for="status" class="text-red-600">Status: 未着手</label>
          @endif
          <div class="text-sm font-light text-gray-500 dark:text-gray-400 pb-3">{{ $item->created_at }}</div>
          <a href="{{ route('task_index') }}" class="m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-10 border border-blue-900 rounded-full shadow">ToDo Listへ</a>
        </div>
      </figcaption>
    </figure>
  </div>
</x-app-layout>
