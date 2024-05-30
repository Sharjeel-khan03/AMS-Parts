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

div#orderlist_wrapper {
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
                        <h4 class="">Order List</h4>

                        <div class="">
                            <a href="#" class="btn btn-dark btn-sm" rel="content-y">+ Create</a>
                        </div>

                    </div>

                    <div class="pb-20">
                        <table class="table stripe hover nowrap" id="orderlist">
                            <thead>
                                <tr class="text-center">
                                    <th class="table-plus datatable-nosort">Order Number</th>
                                    <th>Quote Number</th>
                                    <th>Date</th>
                                    <th>User Name</th>
                                    <th>Order Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Status</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $order)
                                @php
                                                                $firstOrderLine = $order->orderLineFront->first();
                                                            @endphp
                                    {{-- @foreach ($order->orderLine as $ordeline) --}}
                                        {{-- @foreach ($ordeline->itemProduct as $item) --}}
                                            <tr class="text-center">
                                                <td class="table-plus">{{ $key + 1  }}</td>
                                                <td class="table-plus">{{ $firstOrderLine->quote_id ?? 'N/A'}}</td>
                                                <td>{{date_format($order->created_at, 'Y/m/d h:i A') }}</td>
                                                <td>{{ $order->user->name ?? 'N/A' }}</td>
                                                <td>{{ $firstOrderLine->itemProductFront->name ?? 'N/A'}}</td>
                                                <td>{{ $firstOrderLine->quantity ?? 'N/A'}}</td>
                                                <td>
                                                    {{ $firstOrderLine->itemProductFront->unit_price ?? 'N/A' }}</td>
                                                <td>
                                                    @if ($order->status == 1)
                                                        Processing
                                                    @elseif($order->status == 2)
                                                        Shipped
                                                    @else
                                                        Cancel
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                            href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            {{-- <a class="dropdown-item" href="{{ route('orders.edit',$order->id) }}"><i class="dw dw-edit2"></i> Edit</a> --}}
                                                            <form id="destory"
                                                                action="{{ route('orders.destroy', $order->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="dropdown-item" type="submit">
                                                                    <i class="dw dw-delete-3"></i> Delete
                                                                </button>
                                                            </form>

                                                            <a class="dropdown-item"
                                                                href="{{ route('orders.show', $order->id) }}"><i
                                                                    class="fa-solid fa-eye"></i></i> View</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- @endforeach --}}
                                        {{-- @endforeach --}}
                                    {{-- @endforeach --}}
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
            let table = new DataTable('#orderlist', {
                "pageLength": 30,
				"lengthMenu": [30, 50, 100]

            });
        });
        </script>
@endsection
