<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard');
    }

    public function adminDashboard()
    {
        $projects = Project::with('user')->get();
        $totalProjects = Project::count();
        $ongoingProjects = Project::where('status', 'project berjalan')->count();
        $completedProjects = Project::where('status', 'selesai')->count();
        $rejectedProjects = Project::where('status', 'ditolak')->count();
        $supervisors = User::all();
        return view('pages.admin.dashboard', compact('projects', 'totalProjects', 'ongoingProjects', 'completedProjects', 'rejectedProjects', 'supervisors'));
    }


}