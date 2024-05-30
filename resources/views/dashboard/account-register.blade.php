@extends('website.layouts.master')
@section('content')
<!-- site -->
<div class="site">
    <!-- site__body -->
    <div class="site__body">
        <div class="block-space block-space--layout--after-header"></div>
        <div class="block">
            <div class="container container--max--lg">
                <div class="row justify-content-center">
                    <div class="col-md-8 d-flex mt-4 mt-md-0">
                        <div class="card flex-grow-1 mb-0 ml-0 ml-lg-3 mr-0 mr-lg-4">
                            <div class="card-body card-body--padding--2">
                                <h3 class="card-title">Register</h3>
                                <form action="{{route('register.store')}}" method="Post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="signup-first-name">First Name</label>
                                        <input id="signup-first-name" type="text" class="form-control" placeholder="First Name" name="first_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="signup-last-name">Last Name</label>
                                        <input id="signup-last-name" type="text" class="form-control" placeholder="Last Name" name="last_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="signup-email">Email Address</label>
                                        <input id="signup-email" type="email" class="form-control" placeholder="customer@example.com" name="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="signup-role">Type</label>
                                        <select id="signup-role" class="form-control" name="role_id">
                                            <option selected="">Choose...</option>
                                            @foreach ($roles as $key => $role )
                                            <option value="{{$role->id}}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="signup-password">Password</label>
                                        <input id="signup-password" type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="signup-confirm">Repeat Password</label>
                                        <input id="signup-confirm" type="password" class="form-control" placeholder="Password" name="confirm_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="signup-last-name">Address</label>
                                        <input type="text" class="form-control" placeholder="Address" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="signup-last-name">Organization</label>
                                        <input type="text" class="form-control" placeholder="Organization" name="organization">
                                    </div>
                                    <div class="form-group">
                                        <label for="signup-last-name">Upload Document</label>
                                        <input type="file" class="form-control" name="file">
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary mt-3">Register</button>
                                    </div>
                                </form>
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