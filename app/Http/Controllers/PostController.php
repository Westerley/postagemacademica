<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Profile;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Registration;
use App\Course;
use App\Rate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post, Profile $profile)
    {
        $posts = $post->where('id_profile', auth()->user()->id)->orderBy('id', 'desc')->get();
        $profile = $profile->where('id_user', auth()->user()->id)->first();
        $registrations = Registration::where('id_profile', '=', auth()->user()->id)->get();
        $courses = Course::all();
        return view('profile.timeline')->with('posts', $posts)
                                       ->with('profile', $profile)
                                       ->with('registrations', $registrations)
                                       ->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registrations = Registration::where('id_profile', '=', auth()->user()->id)->get();
        $courses = Course::all();
        return view('profile.post')->with('registrations', $registrations)->with('courses', $courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Input::file('file')) {
            $file = Input::file('file');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'rar' && $extension != 'zip') {
                return back()->with('erro', 'Formato de arquivo não suportado, apenas arquivo no formato .rar ou .zip');
            }
        }
        
        $post = new Post;
        $post->title = Input::get('title');
        $post->content = Input::get('content');
        $post->id_profile = Input::get('id_profile');
        $post->id_course = Input::get('course');

        if(Input::file('file')) {
            $post->file = rand(11111, 99999) . '.' . $extension;
            $upload_success = $file->move(public_path() . '/download', $post->file);

            if ($upload_success) {
                $post->save();
                return redirect('/timeline');
            } else {
                return back()->with('erro', 'Erro ao realizar o upload');
            }
        }
    }

    public function rating()
    {
        $post_id = Input::get('post_id');
        $profile_id = auth()->user()->id;
        $type = Input::get('type');

        $rate = Rate::where('id_profile', '=', $profile_id)->where('id_post', '=', $post_id)->count();

        if (!$rate) {
            Rate::create([
                'id_profile' => $profile_id, 
                'id_post' => $post_id,
                $type => 1
            ]);
            return response()->json(array('status' => 'sim', 'qtde' => 1));
        } else {
            $rate = Rate::where('id_profile', '=', $profile_id)->where('id_post', '=', $post_id)->first();
            $row = Rate::find($rate->id);
            if ($row->$type == 0) {
                $row->$type += 1;
                $row->save();
                $count = Rate::where('id_post', '=', $post_id)->where($type, '=', 1)->count();
                return response()->json(array('status' => 'sim', 'qtde' => $count));
            } else {
                $row->$type -= 1;
                $row->save();
                $count = Rate::where('id_post', '=', $post_id)->where($type, '=', 1)->count();
                return response()->json(array('status' => 'sim', 'qtde' => $count));
            }

        }
    }
}
