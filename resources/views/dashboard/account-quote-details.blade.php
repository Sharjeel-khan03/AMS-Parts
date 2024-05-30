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
                                            <a href="{{ route('user-quotes') }}" class="btn btn-xs btn-secondary">Back to
                                                list</a>
                                        </div>
                                        <h5 class="order-header__title">Quote #{{ $data->id }}</h5>
                                        <div class="order-header__subtitle">
                                            Was placed on <mark>{{ date_format($data->created_at, 'Y/m/d h:i A') }}</mark>
                                            and is currently <mark>
                                                @if ($data->status == 1)
                                                    Pending
                                                @elseif($data->status == 2)
                                                    Accepted
                                                    {{-- @elseif($data->status == 3)
                                                Place Order --}}
                                                @else
                                                    Cancel Quote
                                                @endif
                                            </mark>.
                                        </div>
                                    </div>
                                    <div class="card-divider"></div>
                                    <div class="card-table">
                                        <div class="table-responsive-sm">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Unit Price</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                $subcomissionrate = 0;
                                                 $catitem =  App\Models\ItemCategory::where('item_id',$data->itemEdit->id)->first();
                                                  $cat =  App\Models\OrganizationUser::where('category_id',$catitem->category_id)->first();
                                                  $subcomissionrate +=  $data->itemEdit->unit_price + ( $data->itemEdit->unit_price * $cat->organization->commission_rate / 100);
                                                            // {{dd($subcomissionrate);}}
                                                @endphp
                                                <tbody class="card-table__body card-table__body--merge-rows">
                                                    <tr>
                                                        <td>{{ $data->itemEdit->name }} × 1</td>

                                                        <td>
                                                            @if(Auth::check())
                                                            ${{ number_format($subcomissionrate, 2) }}
                                                            @else
                                                            ${{ number_format($data->itemEdit->unit_price, 2) }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody class="card-table__body card-table__body--merge-rows">
                                                    <tr>
                                                        <th>Custom Price</th>
                                                        <td>${{ number_format($data->custome_price, 2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Bulk Quantity</th>
                                                        <td>{{ $data->quantity }}</td>
                                                    </tr>
                                                    {{-- <tr>
                                                    <th>Quantity</th>
                                                    <td>$262.00</td>
                                                </tr> --}}
                                                </tbody>
                                                <tfoot>
                                                    @php
                                                        $shipping = 0;
                                                        $Tax = 0;
                                                        $total = $data->custome_price * $data->quantity;
                                                        $subtotal = $total + $shipping + $Tax;
                                                    @endphp
                                                    <tr>
                                                        <th>Total</th>
                                                        <td>
                                                            
                                                            ${{ number_format($total, 2) }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Shipping</th>
                                                        <td>${{ number_format($shipping, 2) }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Tax</th>
                                                        <td>${{ number_format($Tax, 2) }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>SubTotal</th>
                                                        <td>${{ number_format($subtotal, 2) }}</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row mt-3 no-gutters mx-n2">
                                <div class="col-sm-6 col-12 px-2">
                                    <div class="card address-card address-card--featured">
                                        <div class="address-card__badge tag-badge tag-badge--theme">
                                            Shipping Address
                                        </div>
                                        <div class="address-card__body">
                                            <div class="address-card__name">Ryan Ford</div>
                                            <div class="address-card__row">
                                                Random Federation<br>
                                                115302, Moscow<br>
                                                ul. Varshavskaya, 15-2-178
                                            </div>
                                            <div class="address-card__row">
                                                <div class="address-card__row-title">Phone Number</div>
                                                <div class="address-card__row-content">38 972 588-42-36</div>
                                            </div>
                                            <div class="address-card__row">
                                                <div class="address-card__row-title">Email Address</div>
                                                <div class="address-card__row-content">stroyka@example.com</div>
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
                                            <div class="address-card__name">Ryan Ford</div>
                                            <div class="address-card__row">
                                                Random Federation<br>
                                                115302, Moscow<br>
                                                ul. Varshavskaya, 15-2-178
                                            </div>
                                            <div class="address-card__row">
                                                <div class="address-card__row-title">Phone Number</div>
                                                <div class="address-card__row-content">38 972 588-42-36</div>
                                            </div>
                                            <div class="address-card__row">
                                                <div class="address-card__row-title">Email Address</div>
                                                <div class="address-card__row-content">stroyka@example.com</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
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
