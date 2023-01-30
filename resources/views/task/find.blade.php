<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Find ToDo') }}
      </h2>
  </x-slot>

  <div class="flex justify-center text-xl py-6">
    <form action="/task/find" method="post">
      @csrf
      <input type="text" name="input" value="{{ $input }}">
      <input type="submit" value="find">
  </div>
  </form>
  @if (isset($item))
    <table class="flex justify-center text-xl">
      <tr>
        <th>ToDo</th>
      </tr>
      <tr>
        <td>{{ $item->getData() }}</td>
      </tr>
    </table>
  @endif
</x-app-layout>
