<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('New ToDo') }}
      </h2>
  </x-slot>

  @if (count($errors) > 0)
    <div class="flex justify-center text-xl pt-6">
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
        <strong class="font-bold">
          <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        </strong>
      </div>
    </div>

  @endif
  <form action="/task/add" method="post">
    <table class="flex justify-center text-xl py-6">
      @csrf
        <div class="py-6 ">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 flex flex-col items-center justify-center">
            <div class="p-4 sm:p-8 bg-yellow-50 shadow sm:rounded-lg">
              <p class="text-sm text-gray-900">タスク名</p>
              <h3 class="text-2xl font-semibold text-gray-900 dark:text-white pb-3"><input type="text" name="title" value="{{ old('title') }}"></h3>
                <p class="text-sm text-gray-900">メモ</p>
                <p class="font-light pb-3"><input type="text" name="memo" value="{{ old('memo') }}"></p>
                <p class="text-sm text-gray-900">ステータス</p>
                <select class="form-control" name="status" value="{{ old('status') }}">
                  <option value=0>未着手</option>
                  <option value=1>進行中</option>
                  <option value=2>完了</option>
                </select>
                <figcaption class="flex items-center justify-center space-x-3 pt-6">
                <div class="space-y-0.5 font-medium dark:text-white text-left">
                  <div class="flex justify-center">
                    <input type="submit" value="登録" class="m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow">
                  </div>
                </div>
              </figcaption>
            </div>
          </div>
        </div>
    </table>
  </form>
</x-app-layout>
