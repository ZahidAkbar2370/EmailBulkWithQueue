@extends('Backend.admin_layout')
@section('content')


<div class="row mt-5">
    <div class="col-12">
        <h3>Sent History</h3>
    </div>
    <div class="col-12">
        <table class="table" id="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
              </tr>
            </thead>
            <tbody>
                @if(!empty($allSendEmails))
                    @foreach ($allSendEmails as $emailKey => $sendEmail)
                        <tr>
                            <th scope="row">{{ $emailKey+1 }}</th>
                            <td>{{ $sendEmail->email }}</td>
                            <td>{{ $sendEmail->subject }}</td>
                            <td>{{ $sendEmail->create_at->diffForHumans() }}</td>
                            <td><span class="text-uppercase">{{ $email->status }}</span></td>
                        </tr>
                    @endforeach     
                @endif
            
            </tbody>
          </table>
    </div>
</div>

    
@endsection