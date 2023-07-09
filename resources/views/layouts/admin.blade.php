<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.auth.meta')
        <title>@yield('title') | I-SKSO</title>
        @stack('before-styles')
        @include('includes.auth.styles')
        @stack('after-styles')
    </head>
    {{-- begin page --}}
    <body data-sidebar="dark" data-layout-mode="light">
        <div id="layout-wrapper">
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        {{-- Logo --}}
                        <div class="navbar-brand-box">
                            <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" height="22">
                            </span>
                            <span class="logo-lg">
                                <h2 class="mt-3 text-dark">I-SKSO</h2>
                            </span>
                            </a>
                            <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo-light.svg') }}" alt="logo" height="19">
                            </span>
                            <span class="logo-lg">
                                <h2 class="mt-3 text-light">I-SKSO</h2>
                            </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        {{-- app search --}}

                        <form action="" class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="bx bx-search-alt"></span>
                            </div>
                        </form>

                    </div>
                    <div class="d-flex">
                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                                <form action="" class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Cari Project..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="mdi mdi-magnify"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- notification button --}}
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-bell bx-tad"></i>
                                <span class="badge bg-danger rounded-pill"></span>
                            </button>

                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0" key="t-notifications">Notifications</h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="small" key="view-all">View All</a>
                                        </div>
                                    </div>
                                </div>

                                <div data-simplebar style="max-height: 230px">
                                    <a href="javascript: void(0)" class="text-reset notifications-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-primary">
                                                    <i class="bx bx-cart"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1" key="t-your-order"></h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 border-top d-grid">
                                    <a href="javascript: void(0)" class="btn btn-sm btn-link font-size-14 text-center">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-viewmore">View More... </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('assets/images/rafid.jpg') }}" alt="avatar" class="rounded-circle header-profile-user">
                                <span class="d-none d-xl-inline-block ms-1" key=""></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                {{-- item --}}
                                <a href="#" class="dropdown-item"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="">Profile</span></a>
                                <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
                                <a class="dropdown-item text-danger" href="href={{route('logout')}}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect" >
                                    <i class="bx bx-store"></i>
                                    <span key="t-ecommerce">Data Project</span>
                                </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a  href="#" key="t-product-detail">Data Project</a></li>
                                        <li><a href="#" key="t-product-detail">Project Berjalan</a></li>
                                        <li><a href="#" key="t-product-detail">Project Selesai</a></li>
                                        <li><a href="#" key="t-product-detail">Project Ditolak</a></li>
                                    </ul>

                            </li>

                            <li>
                                <a href="{{ route('admin.boq.index') }}">
                                    <i class="bx bx-store"></i>
                                    <span key="t-ecommerce">Bill Of Quantity</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                        <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
            <div>
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
            <!-- end main content-->
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
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


        @stack('before-script')
        @include('includes.auth.script')
        @stack('after-script')
    </body>
</html>
