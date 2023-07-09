<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rute;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Kml;

class RuteController extends Controller
{
    public function index()
    {
        // Retrieve all KML files from the database
        $kmlFile = Kml::all();

        if (!$kmlFile) {
            return redirect()->route('rute.index')->with('error', 'KML file not found.');
        }
        return view('pages.rute', compact('kmlFile'));
    }

    public function show($id)
    {
        // Find the KML file by ID
        $kmlFile = Kml::find($id);

        if (!$kmlFile) {
            return redirect()->route('rute.index')->with('error', 'KML file not found.');
        }

        return view('pages.rute', ['kmlFilePath' => $kmlFile->file_path]);
    }

    /**
     * Store a newly created Rute.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'kml_file' => 'required|mimes:kml',
        ]);

        // Process and save the uploaded KML file
        if ($request->hasFile('kml_file')) {
            $kmlFile = $request->file('kml_file');
            $kmlFileName = $kmlFile->getClientOriginalName();
            $kmlFilePath = $kmlFile->storeAs('kml_files', $kmlFileName, 'public');

            // Save the KML file details to the database
            $kml = new Kml();
            $kml->title = $request->title;
            $kml->file_path = $kmlFilePath;
            $kml->save();

            // Process the KML file as needed
            $this->processKmlFile($kmlFilePath);

            // Redirect or return a response as desired
            return redirect()->route('rute.index')->with('success', 'KML file imported successfully.');
        }

        // Handle the case when no file is uploaded
        return redirect()->back()->with('error', 'No KML file uploaded.');
    }
    /**
     * Update the specified Rute.
     */
    public function update(Request $request, $id)
    {
        $rute = Rute::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'kml_file' => 'nullable|mimes:kml',
        ]);

        $rute->title = $request->title;

        if ($request->hasFile('kml_file')) {
            $kmlFile = $request->file('kml_file');
            $kmlFileName = $kmlFile->getClientOriginalName();
            $kmlFilePath = $kmlFile->storeAs('kml_files', $kmlFileName, 'public');
            $rute->kml_file = $kmlFilePath;
        }

        $rute->save();

        return redirect()->route('rute.index')->with('success', 'Rute updated successfully.');
    }

    /**
     * Remove the specified Rute.
     */
    public function destroy($id)
    {
        $rute = Rute::findOrFail($id);
        $rute->delete();

        return redirect()->route('rute.index')->with('success', 'Rute deleted successfully.');
    }
}