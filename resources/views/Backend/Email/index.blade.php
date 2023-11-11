@extends('Backend.admin_layout')
@section('content')


@include('Backend.Email.import')

<style>
    .w-5{
        width: 10px !important;
    }
</style>

<div class="row mt-5">
    <div class="col-12">
        <table class="table" id="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(!empty($allEmails))
                    @foreach ($allEmails as $emailKey => $email)
                        <tr>
                            <th scope="row">{{ $emailKey+1 }}</th>
                            <td>{{ $email->user_name }}</td>
                            <td>{{ $email->email }}</td>
                            <td><span class="text-uppercase">{{ $email->status }}</span></td>
                            <td>
                                @if($email->status == "active")
                                    <a href="{{ url('update-email-status/'.$email->id.'/inactive') }}" class="btn btn-danger">Inactive</a>
                                @else
                                    <a href="{{ url('update-email-status/'.$email->id.'/active') }}" class="btn btn-success">Active</a>
                                @endif
                                <a href="{{ url('delete-email', $email->id) }}" onclick="return confirm('Are you Sure to Delete This Email?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            
            </tbody>
          </table>

          @if(!empty($allEmails))
                    <div class="mt-5 mb-5 paginationMain">
                        {{ $allEmails->links() }}  
                        </div>   
                @endif
    </div>
</div>

    
@endsection