@extends('admin.layouts.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Create Customer</h4>
                            <p class="mb-30"></p>
                        </div>

                    </div>
                    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">First Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Johnny Brown" name="first_name"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Last Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Johnny Brown" name="last_name" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control"  type="email" name="email"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">User Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control"  type="text" name="user_name"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Contact</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="number" name="contact" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="address" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Select Type</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="role_id">
                                    <option selected="">Choose...</option>
                                    @foreach ($roles as $key => $role )
                                     <option value="{{$role->id}}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control"  type="password" name="password" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Repeat Password</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" value="" type="password" name="confirm_password" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col d-flex justify-content-end">
                                <button class="btn btn-dark" type="submit">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>

                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms End -->
            </div>
        </div>
    </div>
@endsection
