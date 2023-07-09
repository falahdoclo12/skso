@extends('layouts.app')

@section('title', 'Create BOQ')

@section('content')
    <!-- Start Content -->
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">BOQ Form</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form id="boqForm" style="max-width: 600px; margin: 0 auto;">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" id="description" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="sto">STO</label>
                                <input type="text" id="sto" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="locations">Locations</label>
                                <input type="text" id="locations" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="supervisors">Supervisors</label>
                                <input type="text" id="supervisors" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Designators</label>
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
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save BOQ</button>
                                <button type="button" class="btn btn-secondary" onclick="closeBoqForm()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
    <!-- End Content -->
    @push('after-script')
    {{-- <script src="{{ asset('assets/js/boq.js') }}"></script> --}}
    <script>
        function addDesignatorRow() {
            const designatorsTable = document.getElementById("designatorsTable");
            const rowCount = designatorsTable.rows.length;
            const row = designatorsTable.insertRow(rowCount);
            var datadesig = {!! $designator !!};
            $.each(datadesig, function(index, option) {
                var $option = $('<option>', {
                    value: option.designator,
                    text: option.designator
                })

                $('#myselect').append($option);
            })

                row.innerHTML = `
                <td>${rowCount}</td>
                <td>
                <select id="myselect" class="form-input" onchange="getDesignatorDetails(this)"> </select>`;
                }
    </script>
    @endpush
@endsection
