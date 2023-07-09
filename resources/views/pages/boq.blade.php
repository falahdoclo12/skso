@extends('layouts.app')

@section('title', 'Bill Of Quantity')
    

@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Bill of Quantity</h4>
                        <a href="{{ route('boq.create') }}" class="btn btn-primary">Create New BOQ</a>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <h2>BOQ Files</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- BOQ data will be dynamically added here -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection