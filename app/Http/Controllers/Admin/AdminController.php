<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard');
    }

    public function dashboard()
    {
        $totalProjects = Project::count();
        $ongoingProjects = Project::where('status', 'project berjalan')->count();
        $completedProjects = Project::where('status', 'selesai')->count();
        $rejectedProjects = Project::where('status', 'ditolak')->count();

        return view('pages.admin.dashboard', compact('totalProjects', 'ongoingProjects', 'completedProjects', 'rejectedProjects'));
    }


}