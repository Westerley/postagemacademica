<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Post;
use App\Registration;
use App\Course;
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
        $registrations = Registration::where('id_profile', '=', auth()->user()->id)->get();
        $courses = Course::all();
        $posts = DB::table('registrations')
            ->join('posts', function ($join) {
                $join->on('posts.id_course', '=', 'registrations.id_courses')
                    ->where('registrations.id_profile', '=', auth()->user()->id);
            })
            ->orderBy('posts.id', 'desc')->get();
        return view('/home', compact('posts'))->with('registrations', $registrations)->with('courses', $courses);
    }
}
