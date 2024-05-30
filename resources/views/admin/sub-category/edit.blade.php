@extends('admin.layouts.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="">Edit SubCategory</h4>
                            <p class="mb-30"></p>
                        </div>

                    </div>
                    <form action="{{route('sub-categories.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Select Catory</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="category_id">
                                    <option selected="">Choose...</option>
                                    @foreach ($dataCat as $key => $category )
                                     <option value="{{$category->id}}"{{ $category->id == $data->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">SubCatory Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="name" value="{{$data->name}}"/>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col d-flex justify-content-end">
                                <button class="btn btn-dark" type="submit">
                                    Update
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
