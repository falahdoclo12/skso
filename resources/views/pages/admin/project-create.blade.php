@extends('layouts.admin')

@section('title', 'Project')

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Create New Project</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <label for="title" class="col-form-label col-lg-2">Title</label>
                                    <div class="col-lg-10">
                                        <input id="title" name="title" type="text" class="form-control" placeholder="Enter Project Title..." required>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="description" class="col-form-label col-lg-2">Description</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Project Description..." required></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="sto" class="col-form-label col-lg-2">STO</label>
                                    <div class="col-lg-10">
                                        <input id="sto" name="sto" type="text" placeholder="Enter Project STO..." class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="location" class="col-form-label col-lg-2">Location</label>
                                    <div class="col-lg-10">
                                        <input id="location" name="location" type="text" placeholder="Enter Project Location..." class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="supervisor" class="col-form-label col-lg-2">Supervisor</label>
                                    <div class="col-lg-10">
                                        <select class="form-select" id="supervisor" name="supervisor" required>
                                            <option value="">Select Supervisor</option>
                                            @foreach ($supervisors as $supervisor)
                                                <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-form-label col-lg-2">Attached Files</label>
                                    <div class="col-lg-10">
                                        <input name="files[]" type="file" multiple />
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Create Project</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
