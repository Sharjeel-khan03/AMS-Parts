@extends('admin.layouts.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="">Create Item</h4>
                            <p class="mb-30"></p>
                        </div>
                    </div>
                    <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Category</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="category_id" id="category">
                                    <option selected="">Choose...</option>
                                    @foreach ($category as $key => $cat )
                                     <option value="{{$cat->id}}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Sub Category</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="sub_category_id" id="subcategory" >
                                    <option selected="">Choose...</option>
                                    {{-- @foreach ($subcategory as $key => $subcat )
                                     <option value="{{$subcat->id}}">{{ $subcat->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Part Number</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="part_no"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Item Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="name"/>
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Currency</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="currency_id">
                                    <option selected="">Choose...</option>
                                    @foreach ($currency as $key => $value )
                                     <option value="{{$value->id}}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Unit Price</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="" name="unit_price" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Item Description</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control"  type="text" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Item Image</label>
                            <div class="col-sm-12 col-md-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="imageInput" name="image"/>
                                <label class="custom-file-label">Choose file</label>
                            </div>
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

    <script>
        $(document).ready(function() {
        $('#imageInput').change(function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
        });
    });
    </script>

@endsection
