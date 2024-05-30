@extends('website.layouts.master')
@section('content')
    <!-- site -->
    <div class="site">
        <!-- site__body -->
        <div class="site__body">
            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container container--max--lg">
                    <div class="row">
                        <div class="col-12 d-flex mt-4 mt-md-0">
                            <div class="card flex-grow-1 mb-0 ml-0 ml-lg-3 mr-0 mr-lg-4">
                                <div class="card-body card-body--padding--2">
                                    <h3 class="card-title">Change Password</h3>
                                <div class="form-group">
                                    <label for="password-current">Current Password</label>
                                    <input type="password" class="form-control" id="password-current"
                                        placeholder="Current Password">
                                </div>
                                <div class="form-group">
                                    <label for="password-new">New Password</label>
                                    <input type="password" class="form-control" id="password-new"
                                        placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Reenter New Password</label>
                                    <input type="password" class="form-control" id="password-confirm"
                                        placeholder="Reenter New Password">
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary mt-3">Change</button>
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
    <!-- site / end -->
    </div>
@endsection
