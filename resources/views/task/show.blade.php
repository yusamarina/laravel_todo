<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('ToDo') }}
      </h2>
  </x-slot>

  @if ($items != null)
    @foreach($items as $item)
      <table width="400px">
        <tr>
          <th width="50px">id: </th><td width="50px">{{ $item->id }}</td>
          <th width="50px">title: </th><td>{{ $item->title }}</td>
        </tr>
      </table>
    @endforeach
  @endif
</x-app-layout>
