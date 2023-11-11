@extends('Backend.admin_layout')
@section('content')


<div class="row mt-5">
    <div class="col-12">
        @if(session('success'))
                <div class="alert alert-success mt-2 mb-2">
                    {{ session('success') }}
               </div>
            @endif
        <div class="d-flex justify-content-between">
            <h3>Users</h3>
            <a href="{{ url('add-user') }}" class="btn btn-primary">Add User</a>
        </div>
    </div>
    <div class="col-12 mt-3">
        <table class="table" id="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(!empty($allUsers))
                    @foreach ($allUsers as $userKey => $user)
                        <tr>
                            <th scope="row">{{ $userKey+1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="text-uppercase">{{ $user->status }}</span></td>
                            <td><span class="text-uppercase">{{ $user->role }}</span></td>
                            <td><a href="{{ url('delete-user', $user->id) }}" onclick="return confirm('Are you Sure to Delete This User?')" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach     
                @endif
            
            </tbody>
          </table>
    </div>
</div>

    
@endsection