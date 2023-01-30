<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Delete ToDo') }}
      </h2>
  </x-slot>

  <form action="/task/delete" method="post">
    <table>
      @csrf
      <input type="hidden" name="id" value="{{ $form->id }}">
      <tr><th>title: </th><td>{{ $form->title }}</td></tr>
      <tr><th>memo: </th><td>{{ $form->memo }}</td></tr>
      <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
  </form>
</x-app-layout>
