<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classroom.index', compact('classrooms'));
    }

    public function store(Request $request)
    {
        return Classroom::handleRequestStore($request);
    }

    public function show($id)
    {
        $classroom = Classroom::whereId($id)->get()->last();
        return view('classroom.show', compact('classroom'));
    }

    public function edit($id)
    {
        $classroom = Classroom::whereId($id)->get()->last();
        return view('classroom.edit', compact('classroom'));
    }

    public function update(Request $request, $id)
    {
        return Classroom::handleRequestUpdate($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return Classroom::handleRequestDelete($request, $id);
    }
}
