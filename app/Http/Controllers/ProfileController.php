<?php

namespace App\Http\Controllers;

use App\User;
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
        if(Input::file('image'))
        {
            $image = Input::file('image');
            $extension = $image->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png')
            {
                return back()->with('erro', 'Formato de Imagem não suportado');
            }
            else
            {
                File::delete(public_path().$profile->image);
                File::move($image, public_path() . '/image/profile/user/user-id-' . $profile->id . '.' . $extension);
                $profile->image = '/image/profile/user/user-id-' . $profile->id . '.' . $extension;
                $profile->save();
            }
        }
        if(Input::file('cape'))
        {
            $cape = Input::file('cape');
            $extension = $cape->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png')
            {
                return back()->with('erro', 'Formato de Imagem não suportado');
            }
            else
            {
                File::delete(public_path().$profile->cape);
                File::move($cape, public_path() . '/image/profile/user/user-id-' . $profile->id . '.' . $extension);
                $profile->cape = '/image/profile/cape/cape-id-' . $profile->id . '.' . $extension;
                $profile->save();
            }
        }

        return redirect('/timeline');

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
