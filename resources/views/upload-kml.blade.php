@extends('layouts.app')

@section('title', 'Rute Infrastruktur')

@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Upload Rute</h4>
                    </div>
                </div>
            </div>

            <form action="#" method="post" enctype="multipart/form-data">
                <h3 class="text-center mb-5">Upload File in Laravel</h3>
                  @csrf
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <strong>{{ $message }}</strong>
                  </div>
                @endif
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
                  <div class="custom-file">
                      <input type="file" name="file" class="custom-file-input" id="chooseFile">
                      <label class="custom-file-label" for="chooseFile">Select file</label>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                      Upload Files
                  </button>
              </form>
@endsection