<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('New ToDo') }}
      </h2>
  </x-slot>

  @if (count($errors) > 0)
  <div class="flex justify-center text-xl pt-6">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form action="/task/add" method="post">
    <table class="flex justify-center text-xl py-6">
      @csrf
      <tr><th class="py-3">title: </th><td><input type="string" name="title" value="{{ old('title') }}"></td></tr>
      <tr><th class="py-3">memo: </th><td><input type="text" name="memo" value="{{ old('memo') }}"></td></tr>
      <tr><th class="py-3">status: </th><td>
        <select class="form-control" name="status" value="{{ old('status') }}">
          <option value=0>これからやる</option>
          <option value=1>実行済み！</option>
        </select>
      </td></tr>
      <tr><th></th><td><input type="submit" value="登録" class="m-1 bg-yellow-100 hover:bg-yellow-200 text-blue-900 py-2 px-4 border border-blue-900 rounded-full shadow"></td></tr>
    </table>
  </form>
</x-app-layout>
