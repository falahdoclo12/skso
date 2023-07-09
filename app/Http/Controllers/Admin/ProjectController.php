<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Notifications\ProjectAssignedNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'sto' => 'required',
            'location' => 'required',
            'supervisor_id' => 'required|exists:users,id',
            'kml_file' => 'required|file|mimes:kml',
        ]);

        // Create the project
        $project = Project::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'sto' => $validatedData['sto'],
            'location' => $validatedData['location'],
            'supervisor_id' => $validatedData['supervisor_id'],
        ]);

        // Notify the supervisor
        $supervisor = User::find($validatedData['supervisor_id']);
        if ($supervisor) {
            Notification::send($supervisor, new ProjectAssignedNotification($project));
        } else {
            return redirect()->back()->with('error', 'Supervisor not found. Please choose a valid supervisor.');
        }

        // Handle file upload - .kml file
        if ($request->hasFile('kml_file')) {
            $kmlFile = $request->file('kml_file');
            $kmlFileName = $kmlFile->getClientOriginalName();
            $kmlFilePath = $kmlFile->storeAs('kml_files', $kmlFileName, 'public');

            // Save the KML file path in the database
            $project->kml_file = $kmlFilePath;
            $project->save();
        }

        return redirect()->route('dashboard')->with('success', 'Project created successfully!');
    }
}