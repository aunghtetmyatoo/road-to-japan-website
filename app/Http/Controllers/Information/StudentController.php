<?php

namespace App\Http\Controllers\Information;

use Illuminate\Http\Request;
use App\Models\Information\Student;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        
        return view('students.index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator(request()->all(), [
            "image" => "required",
            "name" => "required",
            "level" => "required",
            "skill" => "required",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $imageName = date('YmdHis') . "." . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/students'), $imageName);

        $student = new Student();
        $student->image = $imageName;
        $student->name = request()->name;
        $student->level = request()->level;
        $student->skill = request()->skill;
        $student->save();

        return redirect('/students');
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
        $student = Student::find($id);
        return view('students.edit', [
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        if (request()->image) {
            $imageName = date('YmdHis') . "." . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/students'), $imageName);
        }
        $student = Student::find($id);
        $student->image = empty($imageName) ? $student->image : $imageName;
        $student->name = request()->name;
        $student->level = request()->level;
        $student->skill = request()->skill;
        $student->save();

        return redirect("/students");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('students');
    }
}