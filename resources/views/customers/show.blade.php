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
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->name) ? $client->name : 'N/A'; ?>" type="text"
                                    name="name" id="name" readonly />
                                <div id="name_error" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Company Name</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->company) ? $client->company : 'N/A'; ?>" type="text"
                                    name="company_name" id="company_name" readonly />
                                <div id="company_name_error" class="text-danger"></div>
                            </div>
                        </div>
                    </div>

                    <!-- ************** -->
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Email Address</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->email) ? $client->email : 'N/A'; ?>" type="email"
                                    name="email" id="email" readonly />
                                <div id="email_error" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Contact</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->contact) ? $client->contact : 'N/A'; ?>" type="number"
                                    name="contact" id="contact" readonly />
                                <div id="contact_error" class="text-danger"></div>
                            </div>
                        </div>
                    </div>

                    <!-- ************** -->
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Website Name</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->website) ? $client->website : 'N/A'; ?>" type="text"
                                    name="name" id="website" readonly />
                                <div id="website_error" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Services</label><br>
                                <input type="text" class="form-control" value="<?php echo isset($client->services) ? $client->services : 'N/A'; ?>" readonly>

                                <div id="services_error" class="text-danger"></div>

                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Total Amount</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->total_amount) ? $client->total_amount : 'N/A'; ?>" type="number"
                                    name="total_amount" id="total_amount" readonly />
                            </div>
                            <div id="total_amount_error" class="text-danger"></div>
                        </div>


                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Paid Amount</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->paid_amount) ? $client->paid_amount : 'N/A'; ?>" type="number"
                                    name="paid_amount" id="paid_amount" readonly />
                            </div>
                            <div id="paid_amount_error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Pending Balance</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->pending_balance) ? $client->pending_balance : 'N/A'; ?>" type="number"
                                    name="pending_balance" id="pending_balance" readonly />
                            </div>
                            <div id="pending_balance_error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Start Date</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->start_date) ? $client->start_date : 'N/A'; ?>" type="date"
                                    name="start_date" id="start_date" readonly />
                            </div>
                            <div id="start_date_error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">End Date</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->end_date) ? $client->end_date : 'N/A'; ?>" type="date"
                                    name="end_date" id="end_date" readonly />
                            </div>
                            <div id="end_date_error" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="card-action">
                        <!-- <button class="btn btn1 add_customer_btn" type="submit">Submit</button> -->
                        <a class="btn btn2" href="<?php echo base_url('customers'); ?>">Go Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
