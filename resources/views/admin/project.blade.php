@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Project List</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Display projects from database -->
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>
                                            <!-- Edit button -->
                                            <button type="button" class="btn btn-sm btn-primary edit-button" data-project-id="{{ $project->id }}">Edit</button>
                                            <!-- Delete button -->
                                            <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Project</div>
                    <div class="card-body">
                        <button type="button" class="btn btn-success" id="createButton">Create Project</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create Project Form -->
        <div class="row mt-3" id="createFormContainer" style="display: none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Project</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.projects.store') }}" id="createProjectForm">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Project Form -->
        <div class="row mt-3" id="editFormContainer" style="display: none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Project</div>
                    <div class="card-body">
                        <form method="POST" id="editProjectForm">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="editTitle">Title</label>
                                <input type="text" class="form-control" id="editTitle" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="editDescription">Description</label>
                                <textarea class="form-control" id="editDescription" name="description" rows="3" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/project.js') }}"></script>
@endsection
