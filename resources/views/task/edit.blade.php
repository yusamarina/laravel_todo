@extends('layouts.app')

@section('title', 'Edit')

@section('menubar')
  @parent
  更新ページ
@endsection

@section('content')
  <form action="/task/edit" method="post">
    <table>
      @csrf
      <input type="hidden" name="id" value="{{ $form->id }}">
      <tr><th>title: </th><td><input type="string" name="title" value="{{ $form->title }}"></td></tr>
      <tr><th>memo: </th><td><input type="text" name="memo" value="{{ $form->memo }}"></td></tr>
      <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
  </form>
@endsection

@section('footer')
copyright 2023 laravel_todo.
@endsection
