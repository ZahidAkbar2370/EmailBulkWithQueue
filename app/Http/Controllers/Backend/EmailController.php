<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\MessageMail;
use App\Models\Email;
use App\Models\SendEmailHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    function index() {
        $allEmails = Email::all();

        return view("Backend.Email.index", compact('allEmails'));
    }

    function sendHistory() {
        $allSendEmails = SendEmailHistory::all();

        return view("Backend.Email.send_history", compact('allSendEmails'));
    }

    function create() {
        return view("Backend.Email.compose");
    }

    function destroy($id){
        Email::find($id)->delete();

        return redirect("emails")->with('success','Email Deleted Successfully!.');
        
    }

    function sendEmail() {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];
         
        Mail::to('your_email@gmail.com')->send(new MessageMail($mailData));
           
        dd("Email is sent successfully.");
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
}
