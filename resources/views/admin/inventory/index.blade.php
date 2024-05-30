@extends('admin.layouts.master')
<style>
    .dt-layout-row.dt-layout-table {
        overflow-x: auto;
    }

    table.dataTable th.dt-type-numeric,
    table.dataTable th.dt-type-date,
    table.dataTable td.dt-type-numeric,
    table.dataTable td.dt-type-date {
        text-align: center !important;
    }

    .card-box.mb-30 {
        padding: 0px 16px;
    }

    table.dataTable thead>tr>th.dt-orderable-asc,
    table.dataTable thead>tr>th.dt-orderable-desc,
    table.dataTable thead>tr>td.dt-orderable-asc,
    table.dataTable thead>tr>td.dt-orderable-desc {
        text-align: center;
        cursor: pointer;
    }

    div#inventorylist_wrapper {
        font-family: "Inter", sans-serif;
    }
</style>
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="d-flex p-3 justify-content-between">
                    <h4 class="">Inventory List</h4>

                    <div class="">
                        <a href="{{route('purchase-order.create') }}" data-toggle="modal" data-target="#uploadModal" class="btn btn-dark btn-sm" rel="content-y">Import File</a>
                    </div>

                </div>

                <div class="pb-20">
                    <table class="table stripe hover nowrap" id="inventorylist">
                        <thead>
                            <tr class="text-center">
                                <th class="table-plus datatable-nosort text-center">S.No</th>
                                <th class="text-center">Part No.</th>
                                <th class="text-center">Item</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">On Hand Quantity</th>
                                <th class="text-center">Allocated Quantity</th>
                                <th class="text-center">Available Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value )
                            <tr class="text-center">
                                <td class="table-plus">{{ $key + 1 }}</td>
                                <td>{{ $value->part_no }}</td>
                                <td>{{ $value->item_name }}</td>
                                <td>{{ $value->category_name }}</td>
                                <td>{{ $value->on_hand_quantity }}</td>
                                <td>{{ $value->allocated_quantity }}</td>
                                <td>{{ $value->available_quantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        let table = new DataTable('#inventorylist', {
            "pageLength": 30,
            "lengthMenu": [30, 50, 100]

        });
    });
</script>


<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<script>
    Dropzone.options.fileUploadDropzone = { // camelized version of the `id`
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 1,
        init: function() {
            this.on("maxfilesexceeded", function(file) {
                this.removeAllFiles();
                this.addFile(file);
            });
        },
        success: function() {
            setTimeout(() => {
                window.location.reload();
            }, 500);
        }
    }
</script>

<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Import File</h5>
                <button id="close-upload-modal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('file-upload')}}" class="dropzone" id="file-upload-dropzone">
                    <div class="dz-message" data-dz-message>
                        <span>Choose Or Darg n Drop Your File.</span>
                        <br>
                        <span>Note: Your File Will Start Uploading Once You Drop It.</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection