<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    public function index()
    {
        $instruments = Instrument::all();
        return view('instrument.index', compact('instruments'));
    }

    public function store(Request $request)
    {
        return Instrument::handleRequestStore($request);
    }

    public function show($id)
    {
        $instrument = Instrument::whereId($id)->get()->last();
        return view('instrument.show', compact('instrument'));
    }

    public function edit($id)
    {
        $instrument = Instrument::whereId($id)->get()->last();
        return view('instrument.edit', compact('instrument'));
    }

    public function update(Request $request, $id)
    {
        return Instrument::handleRequestUpdate($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return Instrument::handleRequestDelete($request, $id);
    }
}
