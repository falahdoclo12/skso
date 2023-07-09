@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Designator</h4>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDesignatorModal">
                            Add Designator
                        </button>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Desinator</h4>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered mb-0">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Designator</th>
                                        <th scope="col">Uraian Project</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Harga Material</th>
                                        <th scope="col">Harga Jasa</th>
                                        <th scope="col">Volume</th>
                                        <th scope="col">Total Material</th>
                                        <th scope="col">Total Jasa</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($designators as $data)
                                                <tr>
                                                    <th scope="row">{{$data->id}}</th>
                                                    <td>{{$data->designator}}</td>
                                                    <td>{{$data->uraian_pekerjaan}}</td>
                                                    <td>{{$data->satuan}}</td>
                                                    <td>{{$data->material}}</td>
                                                    <td>{{$data->jasa}}</td>
                                                    <td>{{$data->volume}}</td>
                                                    <td>{{$data->volume * $data->material}}</td>
                                                    <td>{{$data->volume * $data->jasa}}</td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Add Project Modal -->
    <div class="modal fade" id="addDesignatorModal" tabindex="-1" role="dialog" aria-labelledby="addDesignatorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDesignatorModalLabel">Add Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.boq.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                            @csrf

                            <div class="mb-3">
                                <label for="designator" class="form-label">Designator</label>
                                <input type="text" class="form-control" id="designator" name="designator" required>
                            </div>

                            <div class="mb-3">
                                <label for="project" class="form-label">Uraian Project</label>
                                <textarea class="form-control" id="project" name="project" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="satuan" class="form-label">Satuan</label>
                                <input type="text" class="form-control" id="satuan" name="satuan" required>
                            </div>

                            <div class="mb-3">
                                <label for="material" class="form-label">Harga Material</label>
                                <input type="text" class="form-control" id="material" name="material" required>
                            </div>

                            <div class="mb-3">
                                <label for="jasa" class="form-label">Harga Jasa</label>
                                <input type="text" class="form-control" id="jasa" name="jasa" required>
                            </div>

                            <div class="mb-3">
                                <label for="volume" class="form-label">Volume</label>
                                <input type="text" class="form-control" id="volume" name="volume" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
