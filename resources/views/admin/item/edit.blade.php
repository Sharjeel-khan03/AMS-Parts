@extends('admin.layouts.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="">Edit Item</h4>
                            <p class="mb-30"></p>
                        </div>
                    </div>
                    <form action="{{route('item.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $data->id }}"/>
                        <input type="hidden" name="cate_id" value="{{ $data->ItemCategory->id ?? ''}}"/>
                        <input type="hidden" name="image_id" value="{{ $data->ItemImageFront->id ?? ''}}"/>


                        <div class="form-grimage-dropzoneoup row">
                            <label class="col-sm-12 col-md-2 col-form-label">Category</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" id="category" name="category_id">
                                    <option selected="">Choose...</option>
                                    @foreach ($category as $key => $cat )
                                     <option value="{{$cat->id}}" {{ $cat->id == $data->ItemCategory->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label class="col-sm-12 col-md-2 col-form-label">Sub Category</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12"   id="subcategory" name="sub_category_id">
                                    <option selected="">Choose...</option>
                                    @foreach ($subcategory as $key => $subcat )
                                     <option value="{{$subcat->id}}" {{ $subcat->id == $data->ItemCategory->sub_category_id ? 'selected' : '' }}>{{ $subcat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Part Number</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="part_no" value="{{$data->part_no}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Item Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="name" value="{{$data->name}}"/>
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Currency</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="currency_id">
                                    <option selected="">Choose...</option>
                                    @foreach ($currency as $key => $value )
                                     <option value="{{$value->id}}" {{ $value->id == $data->currency_id ? 'selected' : '' }}>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Unit Price</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="unit_price" value="{{$data->unit_price}}"/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Item Description</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control"  type="text" name="description">{{ $data->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label>Image</label> --}}
                            <label class="col-sm-12 col-md-2 col-form-label">Item Image</label>
                            <div class="col-sm-12 col-md-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"  id="imageInput" name="image"/>
                                <label class="custom-file-label">Choose file</label>
                                <img id="output" width="100px" class="mt-3" src="{{ optional($data->ItemImageFront)->image ? asset($data->ItemImageFront->image) : asset('admin_assets/no-image.jpg') }}">
                            </div>
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

    <script>
        $(document).ready(function() {
        $('#imageInput').change(function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
        });
    });
    </script>

@endsection
