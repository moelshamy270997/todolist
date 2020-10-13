@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('To Do List') }}</div>

          <div class="card-body">

                    @auth
                      <table class="table m-0">
                          <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Content</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col"></th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($todos as $todo)
                              <tr>
                                <th scope="col">1</th>
                                <td scope="col">{{ $todo->content }}</td>
                                <td scope="col">{{ $todo->status }}</td>
                                <td scope="col">{{ $todo->created_at }}</td>
                                <td scope="col">{{ $todo->updated_at }}</td>
                                <td>
                                    <!-- Call to action buttons -->
                                    <ul class="list-inline m-0 float-right">
                                        <li class="list-inline-item">
                                            <a href="{{ route('todolist.edit', $todo->id) }}">
                                              <button class="btn btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit">edit</i></button>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                          <form method="POST" action="{{ route('todolist.destroy', $todo->id) }}"  >
                                            @method('DELETE')
                                            @csrf
                                            <input class="btn btn-danger btn-sm" type="submit" data-toggle="tooltip" data-placement="top" title="Delete" value="delete">
                                          </form>
                                        </li>

                                    </ul>
                                  </td>
                                </tr>
                              @endforeach
                          </tbody>
                      </table>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
