@extends('Backend.admin_layout')
@section('content')


<div class="row mt-5">
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <h3>New User</h3>
        </div>
    </div>
    <div class="col-12 mt-3">
        <form action="{{ URL::to('save-user') }}" method="post">
            @csrf
            <div class="row">
              <div class="col">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" placeholder="Full Name">
                    @if($errors->has('full_name'))
                    <div class="text-danger">{{ $errors->first('full_name') }}</div>
                @endif
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email">
                    @if($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
              </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Set Password">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" required>
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
              </div>

              <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success">
                    </div>
                </div>
              </div>

          </form>
    </div>
</div>

    
@endsection