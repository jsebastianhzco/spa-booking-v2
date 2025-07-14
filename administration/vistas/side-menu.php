
    <!-- App Settings FAB -->
    <div id="app-settings">
        <app-settings layout-active="fluid" :layout-location="{
      'default': 'companies.html',
      'fixed': 'fixed-companies.html',
      'fluid': 'fluid-companies.html',
      'mini': 'mini-companies.html'
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




                    <li class="sidebar-menu-item active">
                        <a class="sidebar-menu-button" href="fluid-companies.html">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">business_center</i>
                            <span class="sidebar-menu-text">Companies</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item ">
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
                                <a class="sidebar-menu-button" href="companies.html">
                                    <span class="sidebar-menu-text">Default</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button" href="fluid-companies.html">
                                    <span class="sidebar-menu-text">Full Width Navs</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="fixed-companies.html">
                                    <span class="sidebar-menu-text">Fixed Navs</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="mini-companies.html">
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