<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Validator;

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
     * Show the form for editing the specified resource.
     *
     * @param  int $id
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
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = validator::make($request->all(), [
            'genre' => 'required',
            'occupation' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/profile/edit/'.$id)->withErrors($validator);
        }

        $profile = Profile::find($id);
        $profile->street = Input::get('street');
        $profile->number = Input::get('number');
        $profile->genre = Input::get('genre');
        $profile->id_occupation = Input::get('occupation');
        $profile->telephone = Input::get('telephone');
        $profile->cellphone = Input::get('cellphone');
        $profile->about = Input::get('about');
        $profile->save();

        return redirect('/profile/edit/'.$id);

    }

    public function updateImage()
    {

        $profile_id = Input::get('profile_id');
        $profile = Profile::find($profile_id);

        if (Input::file('image')) {
            $image = Input::file('image');
            $extension = $image->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png') {
                return redirect('/timeline')->withErrors('erro', 'Formato de Imagem não suportado');
            }
        }

        if (Input::file('image')) {
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

        if (Input::file('cape')) {
            $cape = Input::file('cape');
            $extension = $cape->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png') {
                return back()->with('erro', 'Formato de Imagem não suportado');
            }
        }

        if (Input::file('cape')) {
            $destinationPath = 'image/profile/cape';
            $profile->cape = 'cape-id-' . $profile->id . '.' . $extension;
            $upload_success = $cape->move($destinationPath, $profile->cape);

            if ($upload_success) {
                $profile->save();
                return redirect('/timeline');
            } else {
                return back()->with('erro', 'Erro ao realizar o upload');
            }
        }
    }

    public function newPassword($id)
    {
        $user = User::find($id);
        return view('profile.change-pass', compact('user'));
    }

    public function updatePassword($id)
    {
        $user = User::find($id);
        $oldPassword = Input::get('old-password');
        $newPassword = Input::get('password');
        $rules = array('old-password' => 'required|min:6',
            'password' => 'required|min:6',
            'password-confirm' => 'required|min:6');

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->passes()) {
            if (Input::get('password') != Input::get('password-confirm')) {
                \Session::flash('message', 'Senha Incorreta');
                return $this->newPassword($id);
            }
            if (Hash::check($oldPassword, $user->password)) {
                $user->password = bcrypt($newPassword);
                $user->save();
                \Session::flash('message', 'Senha alterada');
                return $this->newPassword($id);
            } else {
                \Session::flash('message', 'Senha antiga incorreta');
                return $this->newPassword($id);
            }
        }
        \Session::flash('message', 'Senha necessita de no mínimo 6 caracteres');
        return $this->newPassword($id);
    }

}
