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
                        <h4 class="mb-sm-0 font-size-18">Rute Infrastruktur</h4>
                    </div>
                </div>
            </div>

            <div id="map" style="width: 100%; height: 400px;"></div>

            <div class="btn-group" role="group" aria-label="KML Actions">
                <button id="marker-button" class="btn btn-primary">Place Marker</button>
                <button id="polyline-button" class="btn btn-primary">Draw Polygon</button>
                <button id="delete-marker-button" class="btn btn-danger">Delete Markers</button>
                <button id="delete-polyline-button" class="btn btn-danger">Delete Polygon</button>
                <button id="save-button" class="btn btn-success">Save as KML</button>

                <form id="import-form" action="{{ route('rute.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="kml_file" id="kml-file-input">
                    <button type="submit" class="btn btn-success" id="import-button">Import</button>
                </form>

            </div>

            <div class="col-md-8">
                @foreach ($kmlFile as $kmlFile)
                <div class="card">
                    <div class="card-header">Data Rute Infrastruktur</div>
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $kmlFile->id }}</p>
                        <p><strong>Name:</strong> {{ $kmlFile->name }}</p>
                        <p><strong>File Path:</strong> {{ $kmlFile->file_path }}</p>
                        <p><strong>Created At:</strong> {{ $kmlFile->created_at }}</p>
                        <p><strong>Updated At:</strong> {{ $kmlFile->updated_at }}</p>
                        <input type="hidden" id="kml-file-path" value="{{ $kmlFile->file_path }}">
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
