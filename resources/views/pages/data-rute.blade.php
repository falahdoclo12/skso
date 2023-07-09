@extends('layouts.app')

@section('title', 'Data Infrastruktur')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Data Rute Infrastruktur</div>

                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $kmlFile->id }}</p>
                        <p><strong>Name:</strong> {{ $kmlFile->name }}</p>
                        <p><strong>File Path:</strong> {{ $kmlFile->file_path }}</p>
                        <p><strong>Created At:</strong> {{ $kmlFile->created_at }}</p>
                        <p><strong>Updated At:</strong> {{ $kmlFile->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
