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

        $ratingProfiles = DB::table('users')
            ->join('profiles', 'users.id', '=', 'profiles.id_user')
            ->join('posts', 'posts.id_profile', '=', 'profiles.id')
            ->select('users.name', 'profiles.image', DB::raw('COUNT(posts.id_profile) as qtd'))
            ->groupBy('posts.id_profile')
            ->orderBy('qtd', 'desc')
            ->skip(0)->take(5)
            ->get();

        $ratingPosts = DB::table('users')
            ->join('rates', 'users.id', '=', 'rates.id_profile')
            ->join('posts', 'rates.id_post', '=', 'posts.id')
            ->join('profiles', 'profiles.id', '=', 'users.id')
            ->select('users.name', 'posts.title', 'rates.created_at', 'profiles.image', DB::raw('SUM(rates.like) as likes'))
            ->groupBy('rates.id_post')
            ->orderBy('likes', 'desc')
            ->skip(0)->take(5)
            ->get();

        return view('/home', compact('posts'))
                        ->with('registrations', $registrations)
                        ->with('courses', $courses)
                        ->with('users', $user)
                        ->with('ratingPosts', $ratingPosts)
                        ->with('ratingProfiles', $ratingProfiles);
    }
}
