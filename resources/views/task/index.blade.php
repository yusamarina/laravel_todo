@extends('layouts.app')

@section('title', 'Index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <table>
    <tr><th>Title</th><th>Memo</th></tr>
    @foreach ($items as $item)
      <tr>
        <td>{{ $item->title }}</td>
        <td>{{ $item->memo }}</td>
      </tr>
    @endforeach
  </table>
@endsection

@section('footer')
  copyright 2023 laravel_todo.
@endsection
