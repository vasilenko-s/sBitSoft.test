<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Teacher;
use App\Pupil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     *  @return view for filling profile for teacher or pupil in depend of account type
     */
    public function profile()
    {
        $role = strtolower(explode('\\', (Auth::user()->userable_type))[1]);
            return redirect()->route($role);
    }

    public function profileTeacher(){
        //list of subjects
        $subjects=Subject::all();
        return view('profile.teacher')->withSubjects($subjects);
    }

    public function profilePupil(){
        return view('profile.pupil');
    }



    //Teacher profile handling
    protected function teacherValidator(Request $request)
    {
        $request->validate([
            'surname' => ['required', 'string', 'min: 4'],
        ]);
    }

    protected function createTeacher(Request $request)
    {
         Teacher::create([
            'surname' => $request['surname'],
            'category' => $request['category']
        ])->subjects()->attach( $request->input('subject'));
        return;
    }

    public function profileTeacherHandling(Request $request){

        $this->teacherValidator($request);
        $this->createTeacher($request);

        //define userable_id
        $id = Teacher::where('surname', $request['surname'])->first()->id;

        //add it as profile_id User
        $user=Auth::user();
        $user->userable_id = $id;
        $user->save();

        return redirect()->route('home');
    }


    //Pupil profile handling
    protected function pupilValidator(Request $request)
    {
        $request->validate([
            'surname' => ['required', 'string', 'min: 4'],
        ]);
    }

    protected function createPupil(Request $request)
    {
        Pupil::create([
            'surname' => $request['surname']
            ]);
        return;
    }
    public function profilePupilHandling(Request $request){

        $this->pupilValidator($request);
        $this->createPupil($request);

        //define userable_id
        $id = Pupil::where('surname', $request['surname'])->first()->id;

        //add it as profile_id User
        $user=Auth::user();
        $user->userable_id = $id;
        $user->save();

        return redirect()->route('home');
    }

}
