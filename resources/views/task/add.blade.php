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
      <tr><th class="py-3">user: </th><td><input type="integer" name="user_id" value="{{ old('user_id') }}"></td></tr>
      <tr><th class="py-3">title: </th><td><input type="string" name="title" value="{{ old('title') }}"></td></tr>
      <tr><th class="py-3">memo: </th><td><input type="text" name="memo" value="{{ old('memo') }}"></td></tr>
      <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
  </form>
</x-app-layout>
