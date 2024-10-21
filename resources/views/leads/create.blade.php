@extends('layouts/dashboard-layout')
@section('main-section')
<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Add Lead</h3>
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
                <a href="#">Dashboard</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Leads</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <form action="">
            <div class="col-md-12">

                <div class="card">
                    <div class="row">
                        <h5 class="fw-bold pt-4 px-5">Basic Information</h5>
                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Customer Name</label><br>
                                <input class="mt-2 form-control input-style" type="text" name="customer_name" id="customer_name" />
                                <div class="customer_name_error text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Contact</label><br>
                                <input class="mt-2 form-control input-style" type="text" name="phone" id="phone" />
                                <div class="phone_error text-danger"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Date</label><br>
                                <input class="mt-2 form-control input-style" type="date" name="date" id="date" />
                                <div class="date_error text-danger"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Status</label><br>

                                <select name="status" id="status" class="mt-2 form-control input-style">
                                    <option value="">Select Status</option>
                                    <option value="Follow Up">Follow Up</option>
                                    <option value="Deal Closed">Deal Closed</option>
                                    <option value="Not Intrested">Not Intrested</option>
                                    <option value="On Hold">On Hold</option>
                                    <option value="Quotation Send">Quotation Send</option>
                                </select>
                                <div class="status_error text-danger"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="px-4 mt-4 form-group">
                                <label for="name" style="card-font">Requirement</label><br>

                                <textarea class="mt-2 form-control input-style" name="requirement" id="requirement" cols="30" rows="10"></textarea>
                                <div id="email_error" class="text-danger"></div>
                            </div>
                            <div class="requirement_error text-danger"></div>
                        </div>
                    </div>



                    <div class="card-action">
                        <button class="btn btn1" id="add_lead_button" type="submit">Submit</button>
                        <button class="btn btn2">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
