@extends('layouts/dashboard-layout')
@section('main-section')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Add Employee</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Employee</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Dashboard</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="row">
                        <h5 class="fw-bold pt-4 px-5">Employee Information</h5>
                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Employee Id</label><br>
                                <input class="mt-2 form-control input-style" type="text" name="employee_id"
                                    id="employee_id" />
                                <div class="employee_id_error text-danger mt-2"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">First Name</label><br>
                                <input class="mt-2 form-control input-style" type="text" name="first_name"
                                    id="first_name" />
                                <div class="first_name_error text-danger mt-2"></div>
                            </div>
                        </div>
                    </div>

                    <!-- ************** -->
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Last Name</label><br>
                                <input class="mt-2 form-control input-style" type="text" name="last_name"
                                    id="last_name" />
                                <div class="last_name_error text-danger mt-2"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Email Address</label><br>
                                <input class="mt-2 form-control input-style" type="email" name="email" id="email" />
                                <div class="email_error text-danger mt-2"></div>
                            </div>
                        </div>
                    </div>

                    <!-- ************** -->
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Phone</label><br>
                                <input class="mt-2 form-control input-style" type="text" name="phone" id="phone" />
                                <div class="phone_error text-danger mt-2"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Password</label><br>
                                <input class="mt-2 form-control input-style" type="text" name="password"
                                    id="password" />
                                <div class="password_error text-danger mt-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Status</label><br>
                                <select class="mt-2 form-control input-style" name="status" id="status">
                                    <option value="Active">Active</option>
                                    <option value="InActive">InActive</option>
                                </select>
                                <div class="status_error text-danger mt-2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-action">
                        <button class="btn btn1" id="add_Employee" type="submit">Submit</button>
                        <button class="btn btn2">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection