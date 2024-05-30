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
                            <div class="dashboard">
                                <div class="dashboard__profile card profile-card">
                                    <div class="card-body profile-card__body">
                                        <div class="profile-card__avatar">
                                            <img src="{{ asset('website/images/avatars/avatar-4.jpg')}}" alt="">
                                        </div>
                                        <div class="profile-card__name">{{ Auth()->user()->user_name ??  '' }}</div>
                                        <div class="profile-card__email">{{ Auth()->user()->email ??  '' }}</div>
                                        {{-- <div class="profile-card__edit">
                                            <a href="account-profile.html" class="btn btn-secondary btn-sm">Edit Profile</a>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="dashboard__address card address-card address-card--featured">
                                    <div class="address-card__badge tag-badge tag-badge--theme">Default</div>
                                    <div class="address-card__body">
                                        <div class="address-card__name">{{ Auth()->user()->user_name ??  '' }}</div>
                                        <div class="address-card__row">
                                            {{ Auth()->user()->address ??  '' }}<br>
                                            {{ Auth()->user()->city }}<br>
                                            {{ Auth()->user()->state }},{{Auth()->user()->zipcode}}
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">Phone Number</div>
                                            <div class="address-card__row-content">{{ Auth()->user()->contact ??  '' }}</div>
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">Email Address</div>
                                            <div class="address-card__row-content">{{ Auth()->user()->email ??  '' }}</div>
                                        </div>
                                        <div class="address-card__footer">
                                            <a href="{{ route('user-profile-edit') }}">Edit Address</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard__orders card">
                                    <div class="card-header">
                                        <h5>Recent Orders</h5>
                                    </div>
                                    <div class="card-divider"></div>
                                    <div class="card-table">
                                        <div class="table-responsive-sm">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Order Number</th>
                                                        <th>Date</th>
                                                        <th>Order Name</th>
                                                        <th>QUANTITY</th>
                                                        <th>UNIT PRICE</th>
                                                        <th>EXTENDED PRICE</th>
                                                        <th>UOM</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td><a href="#">#8132</a></td>
                                                        <td>02 April, 2019</td>
                                                        <td>Processor</td>
                                                        <td>4</td>
                                                        <td>$2,719.00</td>
                                                        <td>$5,719.00</td>
                                                        <td>23</td>
                                                        <td>Processing</td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td><a href="#">#7592</a></td>
                                                        <td>28 March, 2019</td>
                                                        <td>Processor</td>
                                                        <td>4</td>
                                                        <td>$2,719.00</td>
                                                        <td>$5,719.00</td>
                                                        <td>23</td>
                                                        <td>Received</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">#7192</a></td>
                                                        <td>15 March, 2019</td>
                                                        <td>Processor</td>
                                                        <td>4</td>
                                                        <td>$2,719.00</td>
                                                        <td>$5,719.00</td>
                                                        <td>23</td>
                                                        <td>Received</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">#6321</a></td>
                                                        <td>28 February, 2019</td>
                                                        <td>Processor</td>
                                                        <td>4</td>
                                                        <td>$2,719.00</td>
                                                        <td>$5,719.00</td>
                                                        <td>23</td>
                                                        <td>Received</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">#6001</a></td>
                                                        <td>21 February, 2019</td>
                                                        <td>Processor</td>
                                                        <td>4</td>
                                                        <td>$2,719.00</td>
                                                        <td>$5,719.00</td>
                                                        <td>23</td>
                                                        <td>Received</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">#4120</a></td>
                                                        <td>11 December, 2018</td>
                                                        <td>Processor</td>
                                                        <td>4</td>
                                                        <td>$2,719.00</td>
                                                        <td>$5,719.00</td>
                                                        <td>23</td>
                                                        <td>Received</td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
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
    <!-- site / end -->
@endsection
