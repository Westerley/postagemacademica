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
    public function index()
    {
        $registrations = Registration::where('id_profile', '=', auth()->user()->id)->get();
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
        \Session::flash('message', 'Alteração Realizada com sucesso');

        return $this->index($id);
    }
}
