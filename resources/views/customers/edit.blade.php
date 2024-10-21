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
                            <input type="text" hidden id="customer_id" value="<?php echo isset($client->id) ? $client->id : 'N/A'; ?>">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Customer Name</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->name) ? $client->name : 'N/A'; ?>" type="text"
                                    name="name" id="name" />
                                <div id="name_error" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Company Name</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->company) ? $client->company : 'N/A'; ?>" type="text"
                                    name="company_name" id="company_name" />
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
                                    name="email" id="email" />
                                <div id="email_error" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Contact</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->contact) ? $client->contact : 'N/A'; ?>" type="number"
                                    name="number" id="contact" />
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
                                    name="name" id="website" />
                                <div id="website_error" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Services</label><br>
                                <!-- <select class="pt-2 pb-3 mt-2 form-control" name="" id="services" style="width: 100%; border:1px solid rgb(106,12,248)">
                                    <option value="" selected disabled>--select service--</option>
                                    <option value="web design">Web Design</option>]
                                </select> -->
                                <?php $services = isset($client->services) ? $client->services : 'N/A'; ?>
                                <select class="pt-2 pb-3 mt-2 form-control" name="services" id="services"
                                    style="width: 100%; border:1px solid rgb(106,12,248)">
                                    <option value="" <?php echo $services == 'N/A' ? 'selected' : ''; ?>>--select service--</option>
                                    <option value="web design" <?php echo $services == 'web design' ? 'selected' : ''; ?>>Web Design</option>
                                    <option value="app design" <?php echo $services == 'app design' ? 'selected' : ''; ?>>App Design</option>
                                </select>
                                <div id="services_error" class="text-danger"></div>

                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Total Amount</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->total_amount) ? $client->total_amount : 'N/A'; ?>" type="number"
                                    name="total_amount" id="total_amount" />
                            </div>
                            <div id="total_amount_error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Paid Amount</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->paid_amount) ? $client->paid_amount : 'N/A'; ?>" type="number"
                                    name="paid_amount" id="paid_amount" />
                            </div>
                            <div id="paid_amount_error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Pending Balance</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->pending_balance) ? $client->pending_balance : 'N/A'; ?>" type="number"
                                    name="pending_balance" id="pending_balance" />
                            </div>
                            <div id="pending_balance_error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Start Date</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->start_date) ? $client->start_date : 'N/A'; ?>" type="date"
                                    name="start_date" id="start_date" />
                            </div>
                            <div id="start_date_error" class="text-danger"></div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">End Date</label><br>
                                <input class="mt-2 form-control input-style" value="<?php echo isset($client->end_date) ? $client->end_date : 'N/A'; ?>" type="date"
                                    name="end_date" id="end_date" />
                            </div>
                            <div id="end_date_error" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="card-action">
                        <button class="btn btn1 edit_customer_btn " type="submit">Submit</button>
                        <button class="btn btn2">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
