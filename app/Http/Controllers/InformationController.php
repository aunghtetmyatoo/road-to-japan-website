<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information\Student;
use App\Models\Information\Teacher;

class InformationController extends Controller
{
    public function index() 
    {
        $teachers = Teacher::all();
        $students = Student::all();
        return view('informations.index', [
            'teachers' => $teachers,
            'students' => $students
        ]);
    }
}