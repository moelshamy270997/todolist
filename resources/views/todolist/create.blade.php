@extends('layouts.app')

@section("content")

  @auth

  <div class="container">

    <div class="col-md-8">
      <h1>To Do List</h1>
      <div class="form-group">
        <form action="{{ route('todolist.store') }}" method="POST">
          {{csrf_field()}}

          <input type="text" class="form-control float-left mr-sm-3" style="width: 60%;" name="content" placeholder="Content..." required>
          <input type="text" class="form-control float-left mr-sm-3" style="width: 20%;" name="status" placeholder="Status...">
          <input type="submit" name="submit" value="Add" class="form-control btn btn-success" style="width: 15%;">

        </form>
      </div>


        <table class="table m-0">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Content</th>
                  <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                <tr>
                  <th scope="col">1</th>
                  <td scope="col">{{ $todo->content }}</td>
                  <td scope="col">{{ $todo->status }}</td>
                  
                  </tr>

                @endforeach
            </tbody>
        </table>


    </div>

  </div>

  @endauth
@endsection
