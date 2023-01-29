@extends('layouts.app')

@section('title', 'Delete')

@section('menubar')
  @parent
  削除ページ
@endsection

@section('content')
  <form action="/task/del" method="post">
    <table>
      @csrf
      <input type="hidden" name="id" value="{{ $form->id }}">
      <tr><th>title: </th><td>{{ $form->title }}</td></tr>
      <tr><th>memo: </th><td>{{ $form->memo }}</td></tr>
      <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
  </form>
@endsection

@section('footer')
copyright 2023 laravel_todo.
@endsection
