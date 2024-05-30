@extends('admin.layouts.master')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="">Edit Organization</h4>
                        <p class="mb-30"></p>
                    </div>

                </div>
                <form action="{{route('organizations.update',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="name" value="{{ $data->name }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Commission Rate</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="number" name="commission_rate" value="{{ $data->commission_rate }}" />
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
@endsection