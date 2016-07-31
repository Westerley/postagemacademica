<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use App\Registration;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $registrations = Registration::where('id_profile', '=', $id)->get();
        //$registrations = Registration::get();
        $courses = Course::get();
        return view('profile.courses')->with('courses', $courses)->with('registrations', $registrations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function save(Request $request, $id)
    {
        $registration = Registration::where('id_profile', '=', $id)->count();

        if (!$registration) {
            foreach ($request->courses as $course) {
                $registrationQuery = new Registration();
                $registrationQuery->insert(['id_profile' => $id, 'id_courses' => $course]);
            }
        } else {
            if ($request->courses) {
                Registration::where('id_profile', '=', $id)->delete();
                foreach ($request->courses as $course) {
                    $registrationQuery = new Registration();
                    $registrationQuery->insert(['id_profile' => $id, 'id_courses' => $course]);
                }
            } else {
                Registration::where('id_profile', '=', $id)->delete();
            }
        }
        return $this->index($id);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
