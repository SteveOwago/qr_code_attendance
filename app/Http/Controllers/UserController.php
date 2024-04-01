<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        if(session('error')){
            Alert::error('User Not Available',session('error'));
        }
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        if(session('success')){
            Alert::success('Success',session('success'));
        }

        

        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'name' => 'required|string',
        ]);
    }
    public function markAttendance(Request $request, $qr_code)
    {
        $user = User::where('unique_code', $qr_code)->first();
        $date = Carbon::now()->format('Y-m-d');
        if ($user) {
            return redirect()->route('users.show',$user->id)->with('success',"Attendance for $user->name is marked successfully for $date");
           
        }else{
            return redirect()->route('users.index')->with('error','User QR code is unregistered in our System.');

        }

        
    }
}
