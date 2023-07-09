@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"> User Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Ongoing Projects</p>
                                                <h4 class="mb-0">{{ $ongoingProjects }}</h4>
                                    </div>
                                <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                            <span class="avatar-title">
                                                <i class="bx bx-briefcase-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Ongoing Projects</p>
                                                <h4 class="mb-0">{{ $ongoingProjects }}</h4>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                            <span class="avatar-title">
                                                <i class="bx bx-error-circle font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Completed Projects</p>
                                                <h4 class="mb-0">{{ $completedProjects }}</h4>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                            <span class="avatar-title">
                                                <i class="bx bx-select-multiple font-size-24"></i>
                                            </span>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Project Berjalan</p>
                                        <h5 class="mb-2">Project B</h5>
                                        <p class="mb-0">Bandung</p>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                            <span class="avatar-title">
                                                <i class="bx bxs-analyse font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="page-title-box">

                        <button data-bs-toggle="modal" data-bs-target="#AddService" class="btn btn-primary btn-sm w-xs">
                            <i class="bx bxs-plus-square font-size-16 align-middle me-2"></i>
                                    Add Service
                        </button>

                        <div id="AddService" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Add New Services</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="categories" value="1">
                                            <div class="mb-3">
                                                <label class="form-label">Service Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Example : 86 Diamond">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Providers ID</label>
                                                <input type="text" class="form-control" name="pid" placeholder="Example : 1,2">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Provider API</label>
                                                <select name="provider" class="form-select">
                                                    <option selected="">Pilih Provider</option>
                                                                                                                        </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Provider Price</label>
                                                <input type="text" class="form-control" name="coin" placeholder="Example : 70">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Service Image URL</label>
                                                <input type="url" class="form-control" name="image" placeholder="Example : https://yourdomain.com/image/image.png">
                                                    </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-secondary waves-effect">Reset</button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                    </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->


                        </div>
                    </div>
                </div>
                        <!-- end row -->

                        <div class="row">
                                <div class="col-md-3">
                                    <div class="bg-white p-3 d-flex mb-3 rounded">
                                        <div class="flex-grow-1">
                                          <h5 class="font-size-15 mb-2">
                                            <a href="{{url('project')}}" class="text-body stretched-link">Project A</a>
                                          </h5>
                                          <p class="mb-0 text-muted">
                                            <i class="bx bx-map text-body align-middle"></i> Bandung
                                          </p>
                                        </div>
                                      </div>
                                </div>  
                                <div class="col-md-3">
                                    <div class="bg-white p-3 d-flex mb-3 rounded">
                                        <div class="flex-grow-1">
                                          <h5 class="font-size-15 mb-2">
                                            <a href="{{url('project')}}" class="text-body stretched-link">Project B</a>
                                          </h5>
                                          <p class="mb-0 text-muted">
                                            <i class="bx bx-map text-body align-middle"></i> Bandung
                                          </p>
                                        </div>
                                      </div>
                                </div>  
                                <div class="col-md-3">
                                    <div class="bg-white p-3 d-flex mb-3 rounded">
                                        <div class="flex-grow-1">
                                          <h5 class="font-size-15 mb-2">
                                            <a href="{{url('project')}}" class="text-body stretched-link">Project C</a>
                                          </h5>
                                          <p class="mb-0 text-muted">
                                            <i class="bx bx-map text-body align-middle"></i> Bandung
                                          </p>
                                        </div>
                                      </div>
                                </div>  
                                <div class="col-md-3">
                                    <div class="bg-white p-3 d-flex mb-3 rounded">
                                        <div class="flex-grow-1">
                                          <h5 class="font-size-15 mb-2">
                                            <a href="{{url('project')}}" class="text-body stretched-link">Project D</a>
                                          </h5>
                                          <p class="mb-0 text-muted">
                                            <i class="bx bx-map text-body align-middle"></i> Bandung
                                          </p>
                                        </div>
                                      </div>
                                </div>  
                        </div>



                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->



                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © I-SKSO.
                            </div>
                            <div class="col-sm-6">
                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        @include('includes.auth.script')
    </body>
    
</html>