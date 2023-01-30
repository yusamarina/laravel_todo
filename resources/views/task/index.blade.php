<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('ToDo List') }}
      </h2>
  </x-slot>

  <table class="flex justify-center text-xl">
    <tr><th class="py-6">ToDo List</th></tr>
    @foreach ($items as $item)
      <tr>
        <td>{{ $item->getData() }}</td>
      </tr>
    @endforeach
  </table>
</x-app-layout>
