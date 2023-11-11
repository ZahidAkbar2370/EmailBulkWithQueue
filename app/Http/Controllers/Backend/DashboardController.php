<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\SendEmailHistory;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() {
        $totalUsers = User::count();
        $totalSentEmails = SendEmailHistory::count();
        $totalEmails = Email::count();

        return view('Backend.Dashboard.dashboard', compact('totalUsers', 'totalSentEmails', 'totalEmails'));
    }
}
