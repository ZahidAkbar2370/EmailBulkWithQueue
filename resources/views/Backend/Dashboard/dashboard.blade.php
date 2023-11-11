@extends('Backend.admin_layout')
@section('content')


<div class="row">
    <div class="col-4">
        <div class="card bg-success">
            <div class="card-body">
              <h5 class="card-title text-white">Total Users</h5>
              <p class="card-text text-white text-weight-bold">{{ $totalUsers }}</p>
            </div>
          </div>
    </div>

    <div class="col-4">
        <div class="card bg-primary">
            <div class="card-body">
              <h5 class="card-title text-white">Total Sent Mails</h5>
              <p class="card-text text-white text-weight-bold">{{ $totalSentEmails }}</p>
            </div>
          </div>
    </div>

    <div class="col-4">
        <div class="card bg-danger">
            <div class="card-body">
              <h5 class="card-title text-white">Total Emails</h5>
              <p class="card-text text-white text-weight-bold">{{ $totalEmails }}</p>
            </div>
          </div>
    </div>
</div>

    
@endsection