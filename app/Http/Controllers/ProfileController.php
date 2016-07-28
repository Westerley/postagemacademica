<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Profile;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.timeline');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('layouts.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('profile.profile', compact('profile'));
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
        $profile = Profile::find($id);
        $profile->street        = Input::get('street');
        $profile->number        = Input::get('number');
        $profile->genre         = Input::get('genre');
        $profile->id_occupation = Input::get('occupation');
        $profile->telephone     = Input::get('telephone');
        $profile->cellphone     = Input::get('cellphone');
        $profile->about         = Input::get('about');
        $profile->save();

        return redirect('/timeline');

    }

    public function updateImage()
    {

        $profile_id = Input::get('profile_id');
        $profile = Profile::find($profile_id);

        if(Input::file('image')) {
            $image = Input::file('image');
            $extension = $image->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png') {
                return back()->with('erro', 'Formato de Imagem não suportado');
            }
        }

        if(Input::file('image')) {
            $destinationPath = 'image/profile/user';
            $profile->image = 'user-id-' . $profile->id . '.' . $extension;
            $upload_success = $image->move($destinationPath, $profile->image);

            if ($upload_success) {
                $profile->save();
                return redirect('/timeline');
            } else {
                return back()->with('erro', 'Erro ao realizar o upload');
            }
        }

    }

    public function updateCape()
    {
        $profile_id = Input::get('profile_id');
        $profile = Profile::find($profile_id);

        if(Input::file('cape')) {
            $image = Input::file('cape');
            $extension = $image->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png') {
                return back()->with('erro', 'Formato de Imagem não suportado');
            }
        }

        if(Input::file('cape')) {
            $destinationPath = 'image/profile/cape';
            $profile->image = 'cape-id-' . $profile->id . '.' . $extension;
            $upload_success = $image->move($destinationPath, $profile->image);

            if ($upload_success) {
                $profile->save();
                return redirect('/timeline');
            } else {
                return back()->with('erro', 'Erro ao realizar o upload');
            }
        }
    }

    public function updatePassword($id)
    {
        $profile = Profile::find($id);
        return view('profile.change-pass', compact('profile'));
    }
    
}
