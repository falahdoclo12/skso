<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.user.dashboard');
    }
    public function dashboard()
    {
        //get the ID of logged-in user
        $userId = Auth::id();

        $projects = Project::whereHas('supervisors', function ($query) use ($userId) {
            $query->where('users.id', $userId);
        })->get();
        $totalProjects = Project::count();
        $ongoingProjects = Project::where('status', 'project berjalan')->count();
        $completedProjects = Project::where('status', 'project selesai')->count();

        return view('pages.user.dashboard', compact('projects', 'totalProjects', 'ongoingProjects', 'completedProjects'));
    }
}