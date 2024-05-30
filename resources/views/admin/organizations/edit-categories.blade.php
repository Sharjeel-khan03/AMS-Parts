@extends('admin.layouts.master')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="d-flex p-3 justify-content-between">
                    <h4 class="">Edit Categories List</h4>
                </div>
                <form action="{{route('organizations.update_categories_list',request()->route('id'))}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{request()->route('id')}}" name="organization_id">
                    <div class="d-flex justify-content-center pb-20">
                        <ul id="list" class="list-group list-group-flush" style="width: 90%;">
                            @foreach($data as $key=>$value)
                            <li class="list-group-item d-flex align-items-center p-0 py-3">
                                <select class="custom-select col-8 mr-3" name="list[{{$key}}]" value="{{$value->id}}">
                                    <option value="">Select...</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $value->id ? 'selected' : '' }}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <a href="javascript:void(0)" onclick="removeItem(this)" type="buttons" class="btn btn-danger border rounded">Remove</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="d-flex justify-content-center pb-20">
                        <div style="width: 90%;">
                            <button onclick="addnewRow()" class="btn btn-success btn-sm rounded" type="button">+ ADD</button>
                            <button class="btn btn-dark btn-sm rounded" type="submit">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </div>
</div>

<script>
    var categories = "{{$categories}}";
    categories = JSON.parse(categories.replace(/&quot;/g, '"'));
    var index = document.getElementsByClassName('list-group-item').length ?? 0;
    var lastSerialNo = index + 1;

    function addnewRow() {
        document.getElementById('list').insertAdjacentHTML('beforeend',
            `<li class="list-group-item d-flex align-items-center p-0 py-3">
                <select class="custom-select col-8 mr-3" name="list[${index}]">
                <option value="">Select...</option>
                    ${categories.map((usesr)=>'<option value="'+usesr.id+'">'+usesr.name+'</option>')}
                </select>
                <a href="javascript:void(0)" onclick="removeItem(this)" type="buttons" class="btn btn-danger border rounded">Remove</a>
            </li>`
        );
    };

    function removeItem(event) {
        event.parentElement.remove();
    };
</script>

@endsection