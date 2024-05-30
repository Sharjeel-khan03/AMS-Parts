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

div#userapplist_wrapper {
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
                        <h4 class="">Customers List</h4>

                        <div class="">
                            <a href="{{ route('users.create') }}" class="btn btn-dark btn-sm" rel="content-y">+ Create</a>
                        </div>

                    </div>

                    <div class="ml-2 btn-group border rounded" role="group">
                        <a href="{{ route('users.index') }}"
                            class="btn btn-light {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}">Approved</a>
                        <a href="{{ route('unapprove-users.index') }}"
                            class="btn btn-light {{ Route::currentRouteName() == 'unapprove-users.index' ? 'active' : '' }}">Unapprove</a>
                    </div>

                    <div class="pb-20">
                        <table class="table stripe hover nowrap" id="userapplist">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">S.No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Current Status</th>
                                    <th>Last Login</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $customer)
                                    <tr>
                                        <td class="table-plus">{{ $key + 1 }}</td>
                                        <td>{{ $customer->first_name }}</td>
                                        <td>{{ $customer->last_name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ isset($customer->role->name) ? $customer->role->name : '-' }}</td>
                                        <td>
                                            @if ($customer->isOnline())
                                                <span class="text-success">Online</span>
                                            @else
                                                <span class="text-muted">Offline</span>
                                            @endif

                                        </td>
                                        <td>{{ $customer->last_login_at ? date('j F, Y h:i A', strtotime($customer->last_login_at)) : '' }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    {{-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> --}}
                                                    <a class="dropdown-item"
                                                        href="{{ route('users.edit', $customer->id) }}"><i
                                                            class="dw dw-edit2"></i> Edit</a>
                                                    <form id="destory"
                                                        action="{{ route('users.destroy', $customer->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item" type="submit">
                                                            <i class="dw dw-delete-3"></i> Delete
                                                        </button>
                                                    </form>
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
            let table = new DataTable('#userapplist', {
                "pageLength": 30,
				"lengthMenu": [30, 50, 100]

            });
        });
        </script>
@endsection
