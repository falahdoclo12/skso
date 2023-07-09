<?php

namespace App\Http\Controllers\Admin\BOQ;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\designators;

class IndexController extends Controller
{
    public function index()
    {
        $designators = designators::paginate(10);
        return view('admin.boq.index', compact('designators'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'designator' => 'required',
            'project' => 'required',
            'satuan' => 'required',
            'material' => 'required',
            'jasa' => 'required',
            'volume' => 'required',
        ]);

        // Create the project

        $designators = new designators();
        $designators->designator = $request->designator;
        $designators->uraian_pekerjaan = $request->project;
        $designators->satuan = $request->satuan;
        $designators->material = $request->material;
        $designators->jasa = $request->jasa;
        $designators->volume = $request->volume;
        $designators->save();

        return redirect()->back()->with('success', 'Designator created successfully!');
    }
}
