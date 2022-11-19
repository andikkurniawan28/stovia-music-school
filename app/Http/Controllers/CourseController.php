<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Instrument;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $grades = Grade::all();
        $instruments = Instrument::all();
        return view('course.index', compact('courses', 'grades', 'instruments'));
    }

    public function store(Request $request)
    {
        return Course::handleRequestStore($request);
    }

    public function show($id)
    {
        $course = Course::whereId($id)->get()->last();
        return view('course.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::whereId($id)->get()->last();
        return view('course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        return Course::handleRequestUpdate($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return Course::handleRequestDelete($request, $id);
    }
}
