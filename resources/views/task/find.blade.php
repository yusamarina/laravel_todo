<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Find ToDo') }}
      </h2>
  </x-slot>

  <div class="flex justify-center text-xl py-6">
    <form action="/task/find" method="post">
      @csrf
      <div class="flex items-center border-b border-teal-500 py-2">
        <input type="text" name="input" value="{{ $input }}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
      </div>
      <input type="submit" value="find" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
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
