@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="animate fadeIn">
    <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Users <a href="{{ route('users.index') }}" class="btn btn-success btn-sm  float-right" title="All Users">
            <span data-feather="arrow-left"></span> Go Back
        </a>
      </div>

        <div class="panel-body">
            @include('partials.admin._messages')
            <div class="table-responsive">
              <table class="table table-hover table-striped table-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form class="" action="{{ route('users.restore', ['id' => $user->id]) }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-warning btn-sm float-right" title="Restore" value="delete"> <span data-feather="restore"></span>  Restore</button>
                            </form>

                            <button title="Delete user" type="button" class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#delete_user_{{ $user->id  }}"> <span data-feather="delete"></span> Delete</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="delete_user_{{ $user->id  }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <form class="" action="{{ route('users.destroy', ['id' => $user->id]) }}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header bg-red">
                                <h4 class="modal-title" id="mySmallModalLabel">Delete user</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>

                                <div class="modal-body">
                                Are you sure to delete user: <b>{{ $user->name }} </b>?
                                </div>
                                <div class="modal-footer">
                                <a href="{{ url('/users') }}">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                </a>
                                <button type="submit" class="btn btn-outline" title="Delete" value="delete">Delete</button>
                                </div>
                            </div>
                            </div>
                        </form>
                        </div>
                  
                  
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- Pagination -->
            <div class="pagination justify-content-center mb-4">
                {{ $users->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>
</div>
@endsection

