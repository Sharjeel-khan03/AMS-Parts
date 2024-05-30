@extends('admin.layouts.master')

@section('content')
    {{-- <div class="main-container" style="font-family:Inter;">
        <div class="row">
            <div class="col-12 col-lg-10 mt-4 mt-lg-0 mx-auto">
                <div class="card">
                    <div class="order-header">
                        <div class="order-header__actions" style="text-align: end;">
                            <a href="{{ route('quote.index') }}" class="btn btn-xs btn-secondary">Back to
                                list</a>
                        </div>
                        <h5 class="order-header__title">Quote # {{$data->id}}</h5>
                        <div class="order-header__subtitle">
                            Was placed on <mark>{{date_format($data->created_at,"Y/m/d h:i A")}}</mark> and is currently <mark>Pending</mark>.
                        </div>
                    </div>
                    <div class="card-divider"></div>
                    <div class="card-table">
                        <div class="table-responsive-sm">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="card-table__body card-table__body--merge-rows">
                                    <tr>
                                        <td>{{$data->itemView->name}} × {{$data->quantity}}</td>
                                        <td>${{$data->custome_price}}</td>
                                    </tr>
                                </tbody>
                                <tbody class="card-table__body card-table__body--merge-rows">
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>$1309.00</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>$25.00</td>
                                    </tr>
                                    <tr>
                                        <th>Tax</th>
                                        <td>$262.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <td>$1596.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 no-gutters mx-n2 mb-5">

                </div>
            </div>
        </div>
    </div> --}}

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="">View Quote</h4>
                            <p class="mb-30"></p>
                        </div>
                    </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Quote Number</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="" value="{{$data->id ?? ''}}" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">User Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="" value="{{$data->itemuser->name ?? ''}}" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Item Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="" value="{{$data->itemView->name}}" readonly/>
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
                                <input class="form-control" type="text" placeholder="" name="" value="{{$data->quantity}}" readonly/>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Custom Price</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="" value="{{$data->custome_price}}" readonly/>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

