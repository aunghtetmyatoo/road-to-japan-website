<?php

namespace App\Http\Controllers\Information;

use Illuminate\Http\Request;
use App\Models\Information\Teacher;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        
        return view('teachers.index', [
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
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
            "address" => "required",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $imageName = date('YmdHis') . "." . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/teachers'), $imageName);

        $teacher = new Teacher();
        $teacher->image = $imageName;
        $teacher->name = request()->name;
        $teacher->address = request()->address;
        $teacher->save();

        return redirect('/teachers');
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
        $teacher = Teacher::find($id);
        return view('teachers.edit', [
            'teacher' => $teacher,
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
            request()->image->move(public_path('images/teachers'), $imageName);
        }
        $teacher = Teacher::find($id);
        $teacher->image = empty($imageName) ? $teacher->image : $imageName;
        $teacher->name = request()->name;
        $teacher->address = request()->address;
        $teacher->save();

        return redirect("/teachers");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect('teachers');
    }
}