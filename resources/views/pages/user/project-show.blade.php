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
                        <h4 class="mb-sm-0 font-size-18">Form Wizard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Form Wizard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Project</h4>

                            <div id="basic-example">
                                <!-- Seller Details -->
                                <h3>Rute Infrastruktur</h3>
                                <section>
                                    <div id="map"></div>

                                    <div class="btn-group" role="group" aria-label="KML Actions">
                                        <button id="marker-button" class="btn btn-primary">Place Marker</button>
                                        <button id="polyline-button" class="btn btn-primary">Draw Polygon</button>
                                        <button id="delete-marker-button" class="btn btn-danger">Delete Markers</button>
                                        <button id="delete-polyline-button" class="btn btn-danger">Delete Polygon</button>
                                        <button id="save-button" class="btn btn-success">Save as KML</button>
                                        
                                        
                                        <form id="import form" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="kml_file" id="kml-file-input">
                                        <button type="submit" class="btn btn-success" id="import-button">Import</button>
                                        </form>
                                </section>

                                <!-- Company Document -->
                                <h3>Bill Of Quantity</h3>
                                <section>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-pancard-input">Title</label>
                                                    <input type="text" class="form-control" id="basicpill-pancard-input" placeholder="Enter Your PAN No.">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-vatno-input">Description</label>
                                                    <input type="text" class="form-control" id="basicpill-vatno-input"  placeholder="Enter Your VAT/TIN No.">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-cstno-input">STO</label>
                                                    <input type="text" class="form-control" id="basicpill-cstno-input" placeholder="Enter Your CST No.">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input">Locations</label>
                                                    <input type="text" class="form-control" id="basicpill-servicetax-input" placeholder="Enter Your Service Tax No.">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-companyuin-input">Supervisor</label>
                                                    <input type="text" class="form-control" id="basicpill-companyuin-input" placeholder="Enter Your Company UIN">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-declaration-input">Designator</label>
                                                    <input type="text" class="form-control"id="basicpill-Declaration-input" placeholder="Declaration Details">
                                                    <table id="designatorsTable" class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Designator</th>
                                                                <th>Description</th>
                                                                <th>Unit</th>
                                                                <th>Unit Price (Material)</th>
                                                                <th>Unit Price (Services)</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="designatorsList">
                                                            <!-- Designator data will be dynamically added here -->
                                                        </tbody>
                                                    </table>
                                                    <button type="button" class="btn btn-secondary" onclick="addDesignatorRow()">Add Designator</button>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save BOQ</button>
                                            </div>
                                        </div>
                                    </form>
                                </section>

                                <!-- Bank Details -->
                                <h3>Power Link Budget</h3>
                                <section>
                                    <div>
                                        <form>
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label>Metode Perhitungan:</label>
                                                        <select class="form-select">
                                                            <option selected>Choose an option</option>
                                                            <option value="0.28">Downlink</option>
                                                            <option value="0.35">Uplink</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-cardno-input">Panjang Serat Optik (L):</label>
                                                        <input type="text" class="form-control" id="basicpill-cardno-input"  placeholder="Credit Card Number">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-card-verification-input">Redaman Serat Optik (αserat):</label>
                                                        <input type="text" class="form-control" id="basicpill-card-verification-input" placeholder="Credit Verification Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-expiration-input">Jumlah Konektor</label>
                                                        <input type="text" class="form-control" id="basicpill-expiration-input" placeholder="Card Expiration Date">
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </section>

                                <!-- Confirm Details -->
                                <h3>Confirm Detail</h3>
                                <section>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="text-center">
                                                <div class="mb-4">
                                                    <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                                </div>
                                                <div>
                                                    <h5>Confirm Detail</h5>
                                                    <p class="text-muted">If several languages coalesce, the grammar of the resulting</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection