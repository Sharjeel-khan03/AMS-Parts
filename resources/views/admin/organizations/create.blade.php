@extends('admin.layouts.master')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Create Organization</h4>
                        <p class="mb-30"></p>
                    </div>

                </div>
                <form action="{{route('organizations.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="name" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Commission Rate</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="number" name="commission_rate" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-dark" type="submit">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Default Basic Forms End -->
</div>
</div>
</div>
@endsection