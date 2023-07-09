<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // auth()->user()->unreadNotifications->markAsRead();

        // $projects = auth()->user()->projects;

        // return view('pages.user.project', compact('projects'));
        return view('pages.user.project-show');
    }

    public function show($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect()->route('projects.index')->with('error', 'Project not found.');
        }

        return view('pages.user.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('user.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        // Update the project data
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        // Set the status attribute based on your logic
        $project->status = 'ongoing'; // or 'in_progress'
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }
}