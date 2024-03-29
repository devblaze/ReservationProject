<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function profile(Request $request): Renderable
    {
        $tes = $request->user();
        return view('user.profile', ['data' => $tes]);
    }

    public function reservation(): Renderable
    {
        return view('user.reservations');
    }
}
