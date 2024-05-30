@extends('admin.layouts.master')

@section('content')

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="">Edit Quote</h4>
                            <p class="mb-30"></p>
                        </div>
                    </div>
                        <form action="{{route('quote.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">User Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="user_id" value="{{$data->itemuser->name ?? ''}}" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Item Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="item_id" value="{{$data->itemView->name}}" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Unit Price</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="unit_price" value="{{$data->itemView->unit_price}}" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Bulk Quantity</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="quantity" value="{{$data->quantity}}" />
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Custom Price</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="custome_price" value="{{$data->custome_price}}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Company Offer</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="company_offer" value="{{$data->company_offer ?? ''}}"/>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Change Status</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="status">
                                    <option value="" selected>Choose...</option>
                                    <option value="1">Company Offer</option>
                                    <option value="2">Accepted</option>
                                    <option value="4">Cancel Quote</option>
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
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
