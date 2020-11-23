<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applies = Apply::all();
        
        return view('applies.index', [
            'applies' => $applies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applies.create');
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
            "name" => "required",
            "rollno" => "required",
            "image" => "required",
            "address" => "required",
            "purpose" => "required",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $imageName = date('YmdHis') . "." . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/applies'), $imageName);

        $apply = new Apply();
        $apply->name = request()->name;
        $apply->rollno = request()->rollno;
        $apply->image = $imageName;
        $apply->address = request()->address;
        $apply->purpose = request()->purpose;
        $apply->save();

        return redirect('/applies');
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
        $post = Apply::find($id);
        $post->delete();
        return redirect('applies');
    }
}