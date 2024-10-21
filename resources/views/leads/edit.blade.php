@extends('layouts/dashboard-layout')
@section('main-section')
<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Edit Lead</h3>
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
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <h5 class="fw-bold pt-4 px-5">Basic Information</h5>

                    <div class="col-lg-6 col-md-12">
                        <div class="px-4 mt-4 form-group">
                            <label for="name" style="card-font">Customer Name</label><br>
                            <input class="mt-2 form-control input-style" hidden type="text" name="lead_id" id="lead_id" />
                            <input type="text" hidden value="{{$lead->id ? $lead->id : ''}}" name="id" id="id">
                            <input class="mt-2 form-control input-style" type="text" name="customer_name" id="customer_name" value="{{$lead->name ? $lead->name : ''}}" />
                            <div class="customer_name_error text-danger"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="px-4 mt-4 form-group">
                            <label for="name" style="card-font">Contact</label><br>
                            <input class="mt-2 form-control input-style" type="text" name="phone" id="phone" value="{{$lead->phone ? $lead->phone : ''}}" />
                            <div class="phone_error text-danger"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="px-4 mt-4 form-group">
                            <label for="name" style="card-font">Date</label><br>


                            <input class="mt-2 form-control input-style" type="date" name="date" id="date" value="{{$lead->date ? $lead->date : ''}}" />

                            <div class="date_error text-danger"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="px-4 mt-4 form-group">

                            <label for="name" style="card-font">Status</label><br>


                            <select name="status" id="status" class="mt-2 form-control input-style" onchange="toggleRadioOptions()">
                                <option value="">Select Status</option>
                                <option value="Follow Up" {{ $lead->status == 'Follow Up' ? 'selected' : '' }}>Follow Up</option>
                                <option value="Deal Closed" {{ $lead->status == 'Deal Closed' ? 'selected' : '' }}>Deal Closed</option>
                                <option value="Not Interested" {{ $lead->status == 'Not Interested' ? 'selected' : '' }}>Not Interested</option>
                                <option value="On Hold" {{ $lead->status == 'On Hold' ? 'selected' : '' }}>On Hold</option>
                                <option value="Quotation Sent" {{ $lead->status == 'Quotation Sent' ? 'selected' : '' }}>Quotation Sent</option>
                            </select>


                            <div class="status_error text-danger"></div>
                        </div>
                    </div>
                    <script>
                        function toggleRadioOptions() {
                            var statusSelect = document.getElementById('status');
                            var radioOptions = document.querySelector('.radio-options');

                            if (statusSelect.value === 'Follow Up') {
                                radioOptions.style.display = 'block';
                            } else {
                                radioOptions.style.display = 'none';
                            }
                        }

                        // Initialize the radio buttons visibility based on the initial status value
                        window.onload = function() {
                            toggleRadioOptions();
                        }
                    </script>
                </div>
                <div class="radio-options border shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="px-4 form-group">
                                <label for="followUp1" style="card-font">Follow Up 1</label><br>
                                <textarea class="mt-2 form-control input-style" name="followUp1" id="followUp1" id="followUp1" cols="30" rows="7">{{$follow_up->followUp1 ? $follow_up->followUp1 : ''}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="px-4 form-group">
                                <label for="followUp2" style="card-font">Follow Up 2</label><br>
                                <textarea class="mt-2 form-control input-style" name="followUp2" id="followUp2" id="followUp2" cols="30" rows="7">{{$follow_up->followUp2 ? $follow_up->followUp2 : ''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="px-4 form-group">
                                <label for="followUp3" style="card-font">Follow Up 3</label><br>
                                <textarea class="mt-2 form-control input-style" name="followUp3" id="followUp3" id="followUp3" cols="30" rows="7">{{$follow_up->followUp3 ? $follow_up->followUp3 : ''}}</textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="px-4 form-group">
                                <label for="followUp4" style="card-font">Follow Up 4</label><br>
                                <textarea class="mt-2 form-control input-style" name="followUp4" id="followUp4" id="followUp4" cols="30" rows="7">{{$follow_up->followUp4 ? $follow_up->followUp4 : ''}}</textarea>
                            </div>
                        </div>
                    </div>


                    <div class="px-4 form-group">
                        <label for="followUp5" style="card-font">Follow Up 5</label><br>
                        <textarea class="mt-2 form-control input-style" name="followUp5" id="followUp5" id="followUp5" cols="30" rows="7">{{$follow_up->followUp5 ? $follow_up->followUp5 : ''}}</textarea>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="px-4 mt-4 form-group">
                            <label for="name" style="card-font">Requirement</label><br>

                            <textarea class="mt-2 form-control input-style" name="requirement" id="requirement" cols="30" rows="10">{{$lead->requirement ? $lead->requirement : ''}}</textarea>
                            <div id="email_error" class="text-danger"></div>
                        </div>
                        <div class="requirement_error text-danger"></div>
                    </div>
                </div>



                <div class="card-action">
                    <button class="btn btn1" id="edit_lead" type="submit">Submit</button>
                    <button class="btn btn2">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <style>
    .radio-options {
        display: none;
        margin: 2rem;
    }
</style> --}}
