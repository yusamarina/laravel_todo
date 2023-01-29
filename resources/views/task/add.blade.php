@extends('layouts.app')

@section('title', 'Add')

@section('menubar')
  @parent
  新規作成ページ
@endsection

@section('content')
  <form action="/task/add" method="post">
    <table>
      @csrf
      <tr><th>title: </th><td><input type="string" name="title"></td></tr>
      <tr><th>memo: </th><td><input type="text" name="memo"></td></tr>
      <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
  </form>
@endsection

@section('footer')
copyright 2023 laravel_todo.
@endsection
