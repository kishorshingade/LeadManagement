      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
          <div class="sidebar-logo">
              <!-- Logo Header -->
              <div class="logo-header" data-background-color="dark">
                  <a href="index.html" class="logo">
                      <img src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand"
                          height="20" />
                  </a>
                  <div class="nav-toggle">
                      <button class="btn btn-toggle toggle-sidebar">
                          <i class="gg-menu-right"></i>
                      </button>
                      <button class="btn btn-toggle sidenav-toggler">
                          <i class="gg-menu-left"></i>
                      </button>
                  </div>
                  <button class="topbar-toggler more">
                      <i class="gg-more-vertical-alt"></i>
                  </button>
              </div>
              <!-- End Logo Header -->
          </div>
          <div class="sidebar-wrapper scrollbar scrollbar-inner">
              <div class="sidebar-content">
                  <ul class="nav nav-secondary">
                      <li class="nav-item active">
                          <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                              <i class="fas fa-home"></i>
                              <p>Dashboard</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="dashboard">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="../demo1/index.html">
                                          <span class="sub-item">Dashboard 1</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>

                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#base">
                              <i class="fas fa-layer-group"></i>
                              <p> Customer</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="base">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="{{ asset('add-customer') }}">
                                          <span class="sub-item">Add Customer</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="{{ asset('customers') }}">
                                          <span class="sub-item">Customer List</span>
                                      </a>
                                  </li>

                              </ul>
                          </div>
                      </li>

                      <!-- leads -->
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#sidebarLayouts">
                              <i class="fas fa-th-list"></i>
                              <p>Leads</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="sidebarLayouts">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="/leads/create">
                                          <span class="sub-item">Add Lead</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="/leads">
                                          <span class="sub-item">Leads List</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <!-- Employee -->
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#employee">
                              <i class="fas fa-th-list"></i>
                              <p>Employee</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="employee">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="/add-employee">
                                          <span class="sub-item">Add Employee</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="/employee">
                                          <span class="sub-item">Employee List</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <!-- employee profile -->
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#employee_pro">
                              <i class="fas fa-th-list"></i>
                              <p>Employee Profile</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="employee_pro">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="{{ asset('add-employeeProfile') }}">
                                          <span class="sub-item">Add EmployeeProfile</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="{{ asset('employeeProfile') }}">
                                          <span class="sub-item">EmployeeProfile List</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>

                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#forms">
                              <i class="fas fa-pen-square"></i>
                              <p>Forms</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="forms">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="forms/forms.html">
                                          <span class="sub-item">Basic Form</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#tables">
                              <i class="fas fa-table"></i>
                              <p>Tables</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="tables">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="tables/tables.html">
                                          <span class="sub-item">Basic Table</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="tables/datatables.html">
                                          <span class="sub-item">Datatables</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#maps">
                              <i class="fas fa-map-marker-alt"></i>
                              <p>Maps</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="maps">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="maps/googlemaps.html">
                                          <span class="sub-item">Google Maps</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="maps/jsvectormap.html">
                                          <span class="sub-item">Jsvectormap</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#charts">
                              <i class="far fa-chart-bar"></i>
                              <p>Charts</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="charts">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a href="charts/charts.html">
                                          <span class="sub-item">Chart Js</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="charts/sparkline.html">
                                          <span class="sub-item">Sparkline</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a href="widgets.html">
                              <i class="fas fa-desktop"></i>
                              <p>Widgets</p>
                              <span class="badge badge-success">4</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#submenu">
                              <i class="fas fa-bars"></i>
                              <p>Menu Levels</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="submenu">
                              <ul class="nav nav-collapse">
                                  <li>
                                      <a data-bs-toggle="collapse" href="#subnav1">
                                          <span class="sub-item">Level 1</span>
                                          <span class="caret"></span>
                                      </a>
                                      <div class="collapse" id="subnav1">
                                          <ul class="nav nav-collapse subnav">
                                              <li>
                                                  <a href="#">
                                                      <span class="sub-item">Level 2</span>
                                                  </a>
                                              </li>
                                              <li>
                                                  <a href="#">
                                                      <span class="sub-item">Level 2</span>
                                                  </a>
                                              </li>
                                          </ul>
                                      </div>
                                  </li>
                                  <li>
                                      <a data-bs-toggle="collapse" href="#subnav2">
                                          <span class="sub-item">Level 1</span>
                                          <span class="caret"></span>
                                      </a>
                                      <div class="collapse" id="subnav2">
                                          <ul class="nav nav-collapse subnav">
                                              <li>
                                                  <a href="#">
                                                      <span class="sub-item">Level 2</span>
                                                  </a>
                                              </li>
                                          </ul>
                                      </div>
                                  </li>
                                  <li>
                                      <a href="#">
                                          <span class="sub-item">Level 1</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <!-- End Sidebar -->
