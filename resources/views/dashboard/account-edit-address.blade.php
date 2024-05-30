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

                        <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Edit Address</h5>
                                </div>
                                <div class="card-divider"></div>
                                <form action="{{route('update.profile')}}" method="POST" enctype="multipart/form-data">
                                    @csrf 
                                    <input type="hidden" name="user_id" value="{{Auth()->user()->id ?? ''}}">
                                <div class="card-body card-body--padding--2">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-lg-10 col-xl-8">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="address-first-name">First Name</label>
                                                    <input type="text" class="form-control" id="address-first-name" placeholder="Mark" value="{{Auth()->user()->first_name ?? '' }}" name="first_name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="address-last-name">Last Name</label>
                                                    <input type="text" class="form-control" id="address-last-name" placeholder="Twain" value="{{Auth()->user()->last_name ?? '' }}" name="last_name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address-company-name">Company <span class="text-muted">(Optional)</span></label>
                                                <input type="text" class="form-control" id="address-company-name" placeholder="RedParts corp.">
                                            </div>
                                            <div class="form-group">
                                                <label for="address-country">Country</label>
                                                <select id="address-country" class="form-control" name="country">
                                                    <option value="">Select a country...</option>
                                                    <option value="Australia"  {{ Auth()->user()->country == 'Australia' ? 'selected' : '' }}>Australia</option>
                                                    <option value="Germany"  {{ Auth()->user()->country == 'Germany' ? 'selected' : '' }}>Germany</option>
                                                    <option value="France"  {{ Auth()->user()->country == 'France' ? 'selected' : '' }}>France</option>
                                                    <option value="Italy"  {{ Auth()->user()->country == 'Italy' ? 'selected' : '' }}>Italy</option>
                                                    <option value="Russia"  {{ Auth()->user()->country == 'Russia' ? 'selected' : '' }}>Russia</option>
                                                    <option value="Ukraine"  {{ Auth()->user()->country == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                                                    <option value="United States"  {{ Auth()->user()->country == 'United States' ? 'selected' : '' }}>United States</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="address-address1">Street Address</label>
                                                <input type="text" class="form-control" id="address-address1" placeholder="House number and street name" value="{{Auth()->user()->address ?? '' }}" name="address">
                                                {{-- <label for="address-address2" class="sr-only">Street Address</label>
                                                <input type="text" class="form-control mt-2" id="address-address2" placeholder="Apartment, suite, unit etc."> --}}
                                            </div>
                                            <div class="form-group">
                                                <label for="address-city">City</label>
                                                <input type="text" class="form-control" id="address-city" placeholder="Houston" value="{{Auth()->user()->city ?? '' }}" name="city">
                                            </div>
                                            <div class="form-group">
                                                <label for="address-state">State</label>
                                                <input type="text" class="form-control" id="address-state" placeholder="Texas" value="{{Auth()->user()->state ?? '' }}" name="state">
                                            </div>
                                            <div class="form-group">
                                                <label for="address-postcode">Postcode</label>
                                                <input type="text" class="form-control" id="address-postcode" placeholder="19720" value="{{Auth()->user()->zipcode ?? '' }}" name="zipcode">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="address-email">Email address</label>
                                                    <input type="email" class="form-control" id="address-email" placeholder="user@example.com" value="{{Auth()->user()->email ?? '' }}" name="email" readonly>
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="address-phone">Phone Number</label>
                                                    <input type="text" class="form-control" id="address-phone" placeholder="+1 999 888 7777" value="{{Auth()->user()->contact ?? '' }}" name="contact">
                                                </div>
                                            </div>
                                            <div class="form-row  mt-3">
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="address-email">Password</label>
                                                    <input type="password" class="form-control" id="address-email" placeholder="" name="password">
                                                </div>
                                                <div class="form-group col-md-6 mb-0">
                                                    <label for="address-phone">Confirm Password</label>
                                                    <input type="password" class="form-control" id="address-phone" placeholder=""  name="confirm_password">
                                                </div>
                                            </div>
                                            {{-- <div class="form-group mt-3">
                                                <div class="form-check">
                                                    <span class="input-check form-check-input">
                                                        <span class="input-check__body">
                                                            <input class="input-check__input" type="checkbox" id="default-address" name="set_">
                                                            <span class="input-check__box"></span>
                                                            <span class="input-check__icon"><svg width="9px" height="7px">
                                                                    <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <label class="form-check-label" for="default-address">Set as my default address</label>
                                                </div>
                                            </div> --}}
                                            <div class="form-group mb-0 pt-3 mt-3">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
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
