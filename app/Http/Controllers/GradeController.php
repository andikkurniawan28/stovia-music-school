<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('grade.index', compact('grades'));
    }

    public function store(Request $request)
    {
        return Grade::handleRequestStore($request);
    }

    public function show($id)
    {
        $grade = Grade::whereId($id)->get()->last();
        return view('grade.show', compact('grade'));
    }

    public function edit($id)
    {
        $grade = Grade::whereId($id)->get()->last();
        return view('grade.edit', compact('grade'));
    }

    public function update(Request $request, $id)
    {
        return Grade::handleRequestUpdate($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return Grade::handleRequestDelete($request, $id);
    }
}
