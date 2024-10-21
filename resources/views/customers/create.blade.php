@extends('layouts/dashboard-layout')
@section('main-section')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Forms</h3>
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
                    <a href="#">Forms</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Basic Form</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="row">
                        <h5 class="fw-bold pt-4 px-5">Basic Information</h5>
                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Customer Name</label><br>
                                <input class="mt-2 form-control input-style" type="text" name="name" id="name" />
                                <div id="name_error" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Company Name</label><br>
                                <input class="mt-2 form-control input-style" type="text" name="company_name"
                                    id="company_name" />
                                <div id="company_name_error" class="text-danger"></div>
                            </div>
                        </div>
                    </div>

                    <!-- ************** -->
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Email Address</label><br>
                                <input class="mt-2 form-control input-style" type="email" name="email" id="email" />
                                <div id="email_error" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Contact</label><br>
                                <input class="mt-2 form-control input-style" type="number" name="number" id="contact" />
                                <div id="contact_error" class="text-danger"></div>
                            </div>
                        </div>
                    </div>

                    <!-- ************** -->
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Website Name</label><br>
                                <input class="mt-2 form-control input-style" type="text" name="name" id="website" />
                                <div id="website_error" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Services</label><br>
                                <select class="pt-2 pb-3 mt-2 form-control" name="" id="services"
                                    style="width: 100%; border:1px solid rgb(106,12,248)">
                                    <option value="" selected disabled>--select service--</option>
                                    <option value="web design">Web Design</option>]
                                    <!-- <option value="">Web Design</option>
                                    <option value="">Web Design</option> -->
                                </select>
                                <div id="services_error" class="text-danger"></div>

                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Total Amount</label><br>
                                <input class="mt-2 form-control input-style" type="number" name="total_amount"
                                    id="total_amount" />
                            </div>
                            <div id="total_amount_error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Paid Amount</label><br>
                                <input class="mt-2 form-control input-style" type="number" name="paid_amount"
                                    id="paid_amount" />
                            </div>
                            <div id="paid_amount_error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Pending Balance</label><br>
                                <input class="mt-2 form-control input-style" type="number" name="pending_balance"
                                    id="pending_balance" />
                            </div>
                            <div id="pending_balance_error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Start Date</label><br>
                                <input class="mt-2 form-control input-style" type="date" name="start_date"
                                    id="start_date" />
                            </div>
                            <div id="start_date_error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">End Date</label><br>
                                <input class="mt-2 form-control input-style" type="date" name="end_date"
                                    id="end_date" />
                            </div>
                            <div id="end_date_error" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="card-action">
                        <button class="btn btn1 add_customer_btn" type="submit">Submit</button>
                        <button class="btn btn2">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
