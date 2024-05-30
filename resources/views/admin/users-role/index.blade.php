@extends('admin.layouts.master')
<style>
    .dt-layout-row.dt-layout-table {
    overflow-x: auto;
}
table.dataTable th.dt-type-numeric, table.dataTable th.dt-type-date, table.dataTable td.dt-type-numeric, table.dataTable td.dt-type-date {
    text-align: center !important;
}
.card-box.mb-30 {
    padding: 0px 16px;
}

table.dataTable thead>tr>th.dt-orderable-asc, table.dataTable thead>tr>th.dt-orderable-desc, table.dataTable thead>tr>td.dt-orderable-asc, table.dataTable thead>tr>td.dt-orderable-desc {
    text-align: center;
    cursor: pointer;
}

div#userrolelist_wrapper {
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
                    <h4 class="">User Role</h4>

                    {{-- <a href="{{ route('user-roles.create') }}" class="btn btn-primary btn-sm scroll-click customecss"
                    rel="content-y">Create</a> --}}

                    <div class="">
                        <a href="{{route('user-roles.create') }}" class="btn btn-dark btn-sm" rel="content-y">+ Create</a>
                    </div>

                </div>

                <div class="pb-20">
                    <table class="table stripe hover nowrap" id="userrolelist">
                        <thead>
                            <tr class="text-center">
                                <th class="table-plus datatable-nosort">S.No</th>
                                <th>Role Name</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $role)
                            <tr class="text-center">
                                <td class="table-plus">{{ $key + 1  }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            {{-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> --}}
                                            <a class="dropdown-item" href="{{ route('user-roles.edit', $role->id) }}"><i class="dw dw-edit2"></i> Edit</a>
                                            <!-- <form id="destory" action="{{route('user-roles.destroy',$role->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit">
                                                    <i class="dw dw-delete-3"></i> Delete
                                                </button>
                                            </form> -->
                                        </div>
                                    </div>
                                </td>
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
    $(document).ready(function(){
        let table = new DataTable('#userrolelist', {
                "pageLength": 30,
				"lengthMenu": [30, 50, 100]

            });
    });
    </script>
@endsection
