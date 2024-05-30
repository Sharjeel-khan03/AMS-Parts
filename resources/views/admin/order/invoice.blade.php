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

div#myTable_wrapper {
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
                    <h4 class="">Invoice List</h4>

                    <div class="">
                        <a href="#" class="btn btn-dark btn-sm" rel="content-y">+ Create</a>
                    </div>

                </div>

                <div class="pb-20">
                    <table class="table stripe nowrap " id="myTable">
                        <thead>
                            <tr class="text-center">
                                <th class="table-plus datatable-nosort">Order Number</th>
                                <th>Date</th>
                                <th>Invoice Number</th>
                                <th>Ship Date</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Currency</th>
                                <th>UOM</th>
                                <th>Status</th>
                                <th>Inovice Status</th>
                                <th>Total</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $order)
                                    @php
                                    $firstOrderLine = $order->orderLineFront->first();
                                @endphp

                                        <tr class="text-center">
                                            <td class="table-plus">{{ $key + 1  }}</td>
                                            <td>{{date_format($order->created_at, 'Y/m/d h:i A') }}</td>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ date_format($order->created_at, 'Y/m/d h:i A')  }}</td>
                                            <td>{{ $firstOrderLine->quantity ?? 'N/A'}}</td>
                                            <td>
                                                @if($firstOrderLine && $firstOrderLine->itemProductFront)
                                                ${{$firstOrderLine->itemProductFront->unit_price }}
                                                @else
                                                         ${{number_format(0,2)}}
                                                        @endif
                                            </td>
                                            <td>Dollar</td>
                                            <td>EA</td>
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
                                                Paid
                                            </td>
                                            <td>
                                               ${{number_format($order->total,2)}}
                                            </td>

                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                        href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div
                                                        class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a class="dropdown-item"
                                                            href="{{ route('show-invoice', $order->id) }}"><i
                                                                class="fa-solid fa-eye"></i></i> View</a>
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
        let table = new DataTable('#myTable', {
                "pageLength": 30,
				"lengthMenu": [30, 50, 100]

            });
    });
    </script>
{{-- <script>
         $(document).ready(function() {
           $('#saveStatus').click(function() {
             var selectedStatus = $('#statusDropdown').val();
            //   Perform your AJAX request here to save the status
             $.ajax({
               url: '{{ route('changeStatus') }}',
               method: 'POST',
               data: {
                 status: selectedStatus,
                 _token: '{{ csrf_token() }}'
               },
               success: function(response) {
                  //Handle success response
                 console.log(response.message);
                 // Close the modal
                 $('#statusModal').modal('hide');
                 //Optionally, you can show a notification using Toastr or any other method
             },
             error: function(xhr) {
                // Handle error response
              console.error('An error occurred:', xhr.responseText);
             }
         });
        });
        });
      </script> --}}
@endsection
