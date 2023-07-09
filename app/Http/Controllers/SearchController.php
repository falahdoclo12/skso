<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class SearchController extends Controller
{
    public function search(request $request)
    {
        $query = $request->input('query');

        //Perform the search query based in the 'query' parameter
        $projects = Project::where('name', 'like', '%' . $query . '%')->get();
        $users = User::where('username', 'like', '%' . $query . '%')
            ->orWhere('name', 'like', '%' . $query . '%')->get();

        return response()->json(compact('projects', 'users'), Response::HTTP_OK);
    }
}