<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Rate;
use App\Registration;
use App\Course;
use App\User;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $registrations = Registration::where('id_profile', '=', auth()->user()->id)->get();
        $courses = Course::all();
        $posts = DB::table('registrations')
            ->join('posts', function ($join) {
                $join->on('posts.id_course', '=', 'registrations.id_courses')
                    ->where('registrations.id_profile', '=', auth()->user()->id);
            })
            ->orderBy('posts.id', 'desc')->get();
        return view('/home', compact('posts'))
                        ->with('registrations', $registrations)
                        ->with('courses', $courses)
                        ->with('users', $user);
    }
}
