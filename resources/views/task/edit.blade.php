<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit ToDo') }}
      </h2>
  </x-slot>

  @if (count($errors) > 0)
  <div>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form action="/task/edit" method="post">
    <table>
      @csrf
      <input type="hidden" name="id" value="{{ $form->id }}">
      <tr><th>title: </th><td><input type="string" name="title" value="{{ $form->title }}"></td></tr>
      <tr><th>memo: </th><td><input type="text" name="memo" value="{{ $form->memo }}"></td></tr>
      <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
  </form>
</x-app-layout>
