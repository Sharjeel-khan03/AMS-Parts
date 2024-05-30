@extends('admin.layouts.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="">View Vendor</h4>
                            <p class="mb-30"></p>
                        </div>

                    </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Comapny Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="company_name" value="{{$data->company_name}}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Vendor Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="name" value="{{$data->name}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Vendor Address</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="address" value="{{$data->address}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Vendor Location</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="location"  value="{{$data->location}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Vendor Phone</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="vendor_phone" value="{{$data->vendor_phone}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Vendor Website</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="vendor_website" value="{{$data->vendor_website}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Vendor Net</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="vendor_net" value="{{$data->vendor_net}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Vendor Transport</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="vendor_transport" value="{{$data->vendor_transport}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Vendor Ect</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="vendor_ect" value="{{$data->vendor_ect}}"/>
                            </div>
                        </div>




                    </div>

                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms End -->
            </div>
        </div>
    </div>
@endsection
