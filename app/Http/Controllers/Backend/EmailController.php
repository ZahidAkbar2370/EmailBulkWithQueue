<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\SendMessageEmail;
use App\Mail\MessageMail;
use App\Models\Email;
use App\Models\SendEmailHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{

    function index() {
        $allEmails = Email::orderBy("id", "DESC")->paginate(15);

        return view("Backend.Email.index", compact('allEmails'));
    }

    function sendHistory() {
        $allSendEmails = SendEmailHistory::orderBy("id", "DESC")->paginate(15);

        return view("Backend.Email.send_history", compact('allSendEmails'));
    }

    function create() {
        return view("Backend.Email.compose");
    }

    function destroy($id){
        Email::find($id)->delete();

        return redirect("emails")->with('success','Email Deleted Successfully!.');
        
    }

    function sendEmail(Request $request) {
        $sendTo = $request->email;

        $emails = '';
        if($sendTo == "all"){
            $emails = Email::pluck('email')->toArray();
        }

        if($sendTo == "active_email"){
            $emails = Email::where("status", "active")->pluck('email')->toArray();
        }

        if($sendTo == "inactive_email"){
            $emails = Email::where("status", "inactive")->pluck('email')->toArray();
        }

        if($sendTo == "users"){
            $emails = User::pluck('email')->toArray();
        }

        $finalMessage = 'No Email Availble to Send Message!';
        if(count($emails) > 0){
            $details = [
                // 'email' => [
                //     'zahidjakhar2370@gmail.com',
                //     'janujakhar2370@gmail.com',
                // ],
                'email' => $emails,
                'subject' => $request->subject,
                'message' => $request->message,
            ];

            dispatch(new SendMessageEmail($details));

            foreach($emails as $email){
                SendEmailHistory::create([
                    "email" => $email,
                    "subject" => $request->subject,
                    "message" => $request->message,
                ]);
            }

            $finalMessage = 'Email in Queue it will sent Automatically one by one!';
        }
      
        return redirect('sent-history')->with('success', $finalMessage);
    }

    public function processEmailCSV(Request $request)
{
    $request->validate([
        'csv_file' => 'required|mimes:csv,txt'
    ]);

    $file = $request->file('csv_file');
    $path = $file->getRealPath();
    $data = array_map('str_getcsv', file($path));

    foreach ($data as $row) {
        $checkEmail = Email::where("email", $row[1])->get();
        if(count($checkEmail) == 0){
            Email::create([
                'email' => $row[1],
                'user_name' => $row[0] ?? null,
            ]);
        }
    }

    return redirect('/emails')->with('success', 'CSV file uploaded Successfully!.');
}

function updateEmailStatus($id,$status) {
    $email = Email::find($id);

    $email->status = $status;
    $email->update();

    return redirect('/emails')->with('success', 'Email Status Updated Successfully!.');
}
}
