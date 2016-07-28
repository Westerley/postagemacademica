<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Profile;
use Illuminate\Support\Facades\Gate;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post, Profile $profile)
    {
        $posts = $post->where('id_profile', auth()->user()->id)->get();
        //$user = $profile->where('id_user', auth()->user()->id)->get();
        return view('profile.timeline', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.post');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
