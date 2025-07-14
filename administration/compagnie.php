<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php require_once "includes/head.php";  ?>

<body class="layout-fluid layout-sticky-subnav">



    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <?php require_once "vistas/top-header.php"; ?>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page">

            <?php require_once "vistas/page-header.php"; ?>

    <!-- // END page__header -->




            <div class="container-fluid page__container">
                <div class="card card-shadow">
                    <div class="card-header bg-white d-flex align-items-center">
                        <div class="flex d-flex align-items-center">
                            <div class="rounded border bg-white mr-3" style="padding: 0.25rem;">
                                <img src="assets/images/company.svg" alt="company">
                            </div>
                            <div class="flex">
                                <h4 class="card-title">Medical Clinic Name</h4>
                                <div class="text-muted">3 Employees</div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-light btn-sm ml-3"><i class="material-icons mr-1">edit</i> Edit</button>
                    </div>
                    <div class="card-body">
                        <p>Total Sales: <strong>&dollar;29,291</strong></p>
                        <p>Email: <a href="">contact@frontted.com</a></p>
                        <p>Phone: +1 391 821 291</p>
                        <p class="mb-0">Website: <a href="">https://www.acmecorp.com</a></p>
                    </div>
                    <div class="card-footer card-header-tabs-basic nav" role="tablist">
                        <a href="#overview" class="active" data-toggle="tab" role="tab" aria-selected="true">Overview</a>
                        <a href="#sales" data-toggle="tab" role="tab" aria-selected="false">Sales</a>
                        <a href="#tickets" data-toggle="tab" role="tab" aria-selected="false">Tickets</a>
                        <a href="#activity" data-toggle="tab" role="tab" aria-selected="false">Activity</a>
                    </div>
                </div>

                <div class="row card-group-row">
                    <div class="col-md card-group-row__col">
                        <div class="card card-sm bg-primary border-0 card-group-row__card">
                            <div class="card-body d-flex align-items-center">
                                <div class="flex">
                                    <div class="card-title text-white">Sales</div>
                                    <h4 class="text-white mb-0">&dollar;233,192</h4>
                                </div>
                                <i class="material-icons text-white-50 icon-40pt ml-3">receipt</i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md card-group-row__col">
                        <div class="card card-sm bg-success border-0 card-group-row__card">
                            <div class="card-body d-flex align-items-center">
                                <div class="flex">
                                    <div class="card-title text-white">Orders</div>
                                    <h4 class="text-white mb-0">&dollar;122,245</h4>
                                </div>
                                <i class="material-icons text-white-50 icon-40pt ml-3">receipt</i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md card-group-row__col">
                        <div class="card card-sm bg-primary-dark border-0 card-group-row__card">
                            <div class="card-body d-flex align-items-center">
                                <div class="flex">
                                    <div class="card-title text-white">Growth</div>
                                    <h4 class="text-white mb-0">66%</h4>
                                </div>
                                <i class="material-icons text-white-50 icon-40pt ml-3">receipt</i>
                            </div>
                        </div>
                    </div>
                </div>

     
            </div>




        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

    <!-- App Settings FAB -->
    <div id="app-settings">
        <app-settings layout-active="fluid" :layout-location="{
      'default': 'company.html',
      'fixed': 'fixed-company.html',
      'fluid': 'fluid-company.html',
      'mini': 'mini-company.html'
    }"></app-settings>
    </div>
    <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="end">
        <div class="mdk-drawer__content">
            <div class="sidebar sidebar-light sidebar-left" data-perfect-scrollbar>
                <div class="sidebar-heading sidebar-m-t">Menu</div>
                <ul class="sidebar-menu">

                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="fluid-dashboard.html">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">view_compact</i>
                            <span class="sidebar-menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="fluid-app-chat.html">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">question_answer</i>
                            <span class="sidebar-menu-text">Messages</span>
                        </a>
                    </li>




                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="fluid-companies.html">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">business_center</i>
                            <span class="sidebar-menu-text">Companies</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item  active">
                        <a class="sidebar-menu-button" href="fluid-company.html">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">business_center</i>
                            <span class="sidebar-menu-text">Company</span>
                        </a>
                    </li>



                    <li class="sidebar-menu-item ">
                        <a class="sidebar-menu-button" href="fluid-employees.html">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">people</i>
                            <span class="sidebar-menu-text">Employees</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item ">
                        <a class="sidebar-menu-button" href="fluid-staff.html">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">report</i>
                            <span class="sidebar-menu-text">Reports</span>
                        </a>
                    </li>








                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#layouts_menu">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">view_compact</i>
                            <span class="sidebar-menu-text">Layouts</span>
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse" id="layouts_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="company.html">
                                    <span class="sidebar-menu-text">Default</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button" href="fluid-company.html">
                                    <span class="sidebar-menu-text">Full Width Navs</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="fixed-company.html">
                                    <span class="sidebar-menu-text">Fixed Navs</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="mini-company.html">
                                    <span class="sidebar-menu-text">Mini Sidebar + Navs</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="sidebar-heading">UI Components</div>
                <div class="sidebar-block p-0">
                    <ul class="sidebar-menu" id="components_menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-buttons.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">mouse</i>
                                <span class="sidebar-menu-text">Buttons</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-alerts.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">notifications</i>
                                <span class="sidebar-menu-text">Alerts</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-avatars.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person</i>
                                <span class="sidebar-menu-text">Avatars</span>
                                <span class="badge badge-primary ml-auto">NEW</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-modals.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">aspect_ratio</i>
                                <span class="sidebar-menu-text">Modals</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-charts.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">pie_chart_outlined</i>
                                <span class="sidebar-menu-text">Charts</span>
                                <span class="badge badge-warning ml-auto">PRO</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-icons.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">brush</i>
                                <span class="sidebar-menu-text">Icons</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-forms.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">text_format</i>
                                <span class="sidebar-menu-text">Forms</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-range-sliders.html">
                                <!-- tune or low_priority or linear_scale or space_bar or swap_calls -->
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">tune</i>
                                <span class="sidebar-menu-text">Range Sliders</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-datetime.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">event_available</i>
                                <span class="sidebar-menu-text">Time &amp; Date</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-tables.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dns</i>
                                <span class="sidebar-menu-text">Tables</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-tabs.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">tab</i>
                                <span class="sidebar-menu-text">Tabs</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-loaders.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">refresh</i>
                                <span class="sidebar-menu-text">Loaders</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-drag.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">control_point</i>
                                <span class="sidebar-menu-text">Drag &amp; Drop</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-pagination.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">last_page</i>
                                <span class="sidebar-menu-text">Pagination</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fluid-ui-vector-maps.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">location_on</i>
                                <span class="sidebar-menu-text">Vector Maps</span>
                            </a>
                        </li>
                    </ul>

                    <div class="sidebar-p-a sidebar-b-y">
                        <div class="d-flex align-items-top mb-2">
                            <div class="sidebar-heading m-0 p-0 flex text-body js-text-body">Progress</div>
                            <div class="font-weight-bold text-success">60%</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-p-a">
                    <a href="https://themeforest.net/item/stack-admin-bootstrap-4-dashboard-template/22959011" class="btn btn-outline-primary btn-block">Purchase &dollar;35</a>
                </div>

            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- DOM Factory -->
    <script src="assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="assets/vendor/material-design-kit.js"></script>

    <!-- App -->
    <script src="assets/js/toggle-check-all.js"></script>
    <script src="assets/js/check-selected-row.js"></script>
    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/sidebar-mini.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>



    <!-- Flatpickr -->
    <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="assets/js/flatpickr.js"></script>

    <!-- Global Settings -->
    <script src="assets/js/settings.js"></script>

    <!-- Chart.js -->
    <script src="assets/vendor/Chart.min.js"></script>

    <!-- App Charts JS -->
    <script src="assets/js/chartjs-rounded-bar.js"></script>
    <script src="assets/js/charts.js"></script>

    <!-- Chart Samples -->
    <script src="assets/js/page.company.js"></script>

    <!-- Vector Maps -->
    <!-- <script src="assets/vendor/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="assets/js/vector-maps.js"></script> -->

</body>

</html>