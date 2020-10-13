@extends('layouts.app')

@section("content")

  @auth

  <div class="container">

    <div class="col-md-8">
      <h1>To Do List</h1>
      <div class="form-group">
        <form action="{{ route('todolist.update', $todo->id) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('PUT') }}

          <input type="text" class="form-control float-left mr-sm-3" style="width: 60%;" name="content" value="{{ $todo->content }}" required>
          <input type="text" class="form-control float-left mr-sm-3" style="width: 20%;" name="status" value="{{ $todo->status }}">
          <input type="submit" name="submit" value="Edit" class="form-control btn btn-success" style="width: 15%;">

        </form>

      </div>

    </div>

  </div>

  @endauth
@endsection
