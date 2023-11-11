@extends('Backend.admin_layout')
@section('content')

<style>
    .w-5{
        width: 10px !important;
    }
</style>

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
                            <td><a href="{{ url('sent-email-detail',$sendEmail->id) }}" title="Click To Preview">{!! wordwrap($sendEmail->subject, 50, "<br>", false) !!}</a></td>
                            <td>{{ $sendEmail->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                @endif
            
            </tbody>
          </table>

          @if(!empty($allSendEmails))
                    <div class="mt-5 mb-5 paginationMain">
                        {{ $allSendEmails->links() }}  
                        </div>   
                @endif
    </div>
</div>

    
@endsection