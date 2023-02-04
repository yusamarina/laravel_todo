<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('New ToDo') }}
      </h2>
  </x-slot>

  @if (count($errors) > 0)
    <div class="flex justify-center text-base pt-6">
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
              <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">
                <div class="flex items-center border-b border-teal-500 pt-3">
                  <input type="text" name="title" value="{{ old('title') }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="掃除">
                </div>
              </h3>
              <p class="text-sm text-gray-900 pt-9">メモ</p>
              <div class="flex items-center border-b border-teal-500 pt-3">
                <input type="text" name="memo" value="{{ old('memo') }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="玄関掃除をする。">
              </div>
              <p class="text-sm text-gray-900 pt-9">ステータス</p>
              <div class="inline-block relative w-64 pt-3">
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"  name="status" value="{{ old('status') }}">
                  <option value=0>未着手</option>
                  <option value=1>進行中</option>
                  <option value=2>完了</option>
                </select>
              </div>
              <p class="text-sm text-gray-900 pt-9">期限</p>
              <div class="flex items-center border-b border-teal-500 pt-3">
                <input type="date" name="deadline" value="{{ old('deadline') }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="玄関掃除をする。">
              </div>
              <figcaption class="flex items-center justify-center space-x-3 pt-6">
                <div class="space-y-0.5 font-medium dark:text-white text-left">
                  <div class="flex justify-center">
                    <input type="submit" value="登録" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="button">
                  </div>
                </div>
              </figcaption>
            </div>
          </div>
        </div>
    </table>
  </form>
</x-app-layout>
