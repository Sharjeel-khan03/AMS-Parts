@extends('website.layouts.master')
@section('content')
    <div class="container">
    <!-- site -->
    <div class="site">
        <!-- site__body -->
        <div class="site__body">
            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container container--max--xl">
                    <div class="row">
                        @include('dashboard.sidebar')
                        <div class="col-12 col-lg-10 mt-4 mt-lg-0">
                            <div class="card">
                                <div class="order-header">
                                    <div class="order-header__actions">
                                        <a href="{{route('user-order-invoice')}}" class="btn btn-xs btn-secondary">Back to list</a>
                                    </div>
                                    <div class="order-header__actions">
                                        <a href="{{ route('show.invoice.pdf') }}" target="_blank" class="btn btn-xs btn-secondary pdf_button">Download PDF</a>
                                    </div>
                                    <h5 class="order-header__title">Invoice #{{ $data->id }}</h5>
                                    <div class="order-header__subtitle">
                                        Was placed on <mark>{{ date_format($data->created_at,"Y/m/d h:i A")}}</mark> and is currently <mark>
                                            @if ($data->status == 1)
                                            Processing
                                        @elseif($data->status == 2)
                                            Shipped
                                        @else
                                            Cancel
                                        @endif</mark>.
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
                                                @foreach ($data->orderLineFront as $orderLine)
                                                <tr>
                                                    <td>{{ $orderLine->itemProductFront->name }}× {{ $orderLine->quantity }}</td>
                                                    <td>${{ number_format($orderLine->itemProductFront->unit_price,2) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tbody class="card-table__body card-table__body--merge-rows">

                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td>${{number_format($data->total,2)}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td>$00.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Tax</th>
                                                    <td>$00.00</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Total</th>
                                                    <td>${{number_format($data->total,2)}}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 no-gutters mx-n2">
                                <div class="col-sm-6 col-12 px-2">
                                    <div class="card address-card address-card--featured">
                                        <div class="address-card__badge tag-badge tag-badge--theme">
                                            Shipping Address
                                        </div>
                                        <div class="address-card__body">
                                            <div class="address-card__name">{{Auth()->user()->user_name}}</div>

                                            <div class="address-card__row">
                                                {{$data->shippingAddress->shipping_address ??  Auth()->user()->address}}<br>
                                                {{ $data->shippingAddress->shipping_city  ?? Auth()->user()->city }}<br>
                                                {{ $data->shippingAddress->shipping_state  ?? Auth()->user()->state }},{{$data->shippingAddress->shipping_zipcode  ??Auth()->user()->zipcode}}
                                            </div>

                                            <div class="address-card__row">
                                                <div class="address-card__row-title">Phone Number</div>
                                                <div class="address-card__row-content">{{Auth()->user()->contact}}</div>
                                            </div>
                                            <div class="address-card__row">
                                                <div class="address-card__row-title">Email Address</div>
                                                <div class="address-card__row-content">{{Auth()->user()->email}}</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12 px-2 mt-sm-0 mt-3">
                                    <div class="card address-card address-card--featured">
                                        <div class="address-card__badge tag-badge tag-badge--theme">
                                            Billing Address
                                        </div>
                                        <div class="address-card__body">
                                            <div class="address-card__name">{{Auth()->user()->user_name}}</div>
                                            <div class="address-card__row">
                                                {{Auth()->user()->address  }}<br>
                                                {{ Auth()->user()->city }}<br>
                                                {{ Auth()->user()->state }},{{Auth()->user()->zipcode}}
                                            </div>
                                            <div class="address-card__row">
                                                <div class="address-card__row-title">Phone Number</div>
                                                <div class="address-card__row-content">{{Auth()->user()->contact}}</div>
                                            </div>
                                            <div class="address-card__row">
                                                <div class="address-card__row-title">Email Address</div>
                                                <div class="address-card__row-content">{{Auth()->user()->email}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- site__body / end -->
    </div>
    </div>
    @endsection
