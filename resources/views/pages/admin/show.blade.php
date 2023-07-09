@extends('layouts.app')

@section('title', 'Project')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Project Details</div>

                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $project->id }}</p>
                        <p><strong>Title:</strong> {{ $project->title }}</p>
                        <p><strong>Description:</strong> {{ $project->description }}</p>
                        <p><strong>Created At:</strong> {{ $project->created_at }}</p>
                        <p><strong>Updated At:</strong> {{ $project->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
