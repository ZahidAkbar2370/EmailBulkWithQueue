<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index() {
        $allUsers = User::all();

        return view("Backend.User.index", compact('allUsers'));
    }

    function create() {
        return view("Backend.User.create");
    }

    function store(Request $request) {
        $request->validate([
            "email" => "required|unique:users",
        ]);

        User::create([
            "name" => $request->full_name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role" => $request->role,
        ]);

        return redirect("users")->with('success', $request->full_name . ' User Created Successfully!.');
    }

    function destroy($id){
        User::find($id)->delete();

        return redirect("users")->with('success','User Deleted Successfully!.');
        
    }
}
