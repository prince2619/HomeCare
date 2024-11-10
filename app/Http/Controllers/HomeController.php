<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service;
use App\Models\Booking;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allService = service::get();
        return view('home',compact('allService'));
    }
    public function store(Request $request)
    {
        
        $user = auth()->user(); // Get the authenticated user

         Booking::create([
            'user_id' => $user->id,
            'date' => $request->date,
            'time' => $request->time,
            'phone' => $request->phone,
            'email' => $user->email,
            'service_id' => $request->service_id,
            'price' => $request->price,
            'message' => $request->message,
        ]);
        return redirect()->route('home')->with('message', 'Booking stored successfully!');

    }
}
