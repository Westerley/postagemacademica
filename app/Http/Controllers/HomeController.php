<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use App\Profile;
use App\Rate;
use App\Registration;
use App\Course;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
            ->join('posts', 'posts.id_course', '=', 'registrations.id_courses')
            ->join('profiles', 'profiles.id', '=', 'posts.id_profile')
            ->join('users', 'users.id', '=', 'profiles.id_user')
            ->where('registrations.id_profile', '=', auth()->user()->id)
            ->select('users.name', 'profiles.image', 'posts.id', 'posts.title', 'posts.content', 'posts.file')
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

    public function search()
    {
        $id_course = Input::get('search');

        $posts = Post::where('id_course', '=', $id_course)->get();

        return response()->json(array('status' => 'sim', 'posts' => $posts));

    }
}
