@extends('admin.layouts.master')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="">Customer Details</h4>
                        <p class="mb-30"></p>
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">First Name</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" disabled type="text" placeholder="Johnny Brown" name="first_name" value="{{ $data->first_name }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Last Name</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" disabled type="text" placeholder="Johnny Brown" name="last_name" value="{{ $data->last_name }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" disabled type="email" name="email" value="{{ $data->email }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">User Name</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" disabled type="text" name="user_name" value="{{ $data->user_name }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Contact</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" disabled type="number" name="contact" value="{{ $data->contact }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" disabled type="text" name="address" value="{{ $data->address }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Type</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" disabled type="text" name="address" value="{{ isset($data->role->name) ? $data->role->name : '-' }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Organization</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" disabled type="text" name="organization" value="{{ $data->organization }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Document</label>
                    <div class="col-sm-12 col-md-10">
                        <a href="{{$data->file}}" target="_blank">{{$data->file}}</a>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col d-flex justify-content-end">
                        <form action="{{route('unapprove-users.update',$data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="1">
                            <button class="btn btn-success mr-2" type="submit">
                                Approve
                            </button>
                        </form>
                        <form action="{{route('unapprove-users.update',$data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="0">
                            <button class="btn btn-danger" type="submit">
                                Unapprove
                            </button>
                        </form>
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
