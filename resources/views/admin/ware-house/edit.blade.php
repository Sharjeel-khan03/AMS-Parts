@extends('admin.layouts.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="">Edit Ware House</h4>
                            <p class="mb-30"></p>
                        </div>

                    </div>
                    <form action="{{ route('warehouse.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Ware House" name="name" value="{{ $data->name }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Type</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Ware House Type" name="type" value="{{ $data->type }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Location</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Ware House Location" name="location" value="{{ $data->location }}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Currency</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="currency_id" >
                                    <option selected="">Choose...</option>
                                    @foreach ($currency as $key => $value)
                                        <option value="{{ $value->id }}" {{ $value->id == $data->currency_id  ? 'selected' : ''}}>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col d-flex justify-content-end">
                                <button class="btn btn-dark" type="submit">
                                    Update
                                </button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <!-- Default Basic Forms End -->
    </div>

@endsection
