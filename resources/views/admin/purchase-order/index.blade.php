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

div#purchanseorder_wrapper {
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
						<h4 class="">Purchase Orders List</h4>

						<div class="">
							<a href="{{route('purchase-order.create') }}" class="btn btn-dark btn-sm" rel="content-y"
								>+ Create</a>
						</div>

					</div>

					<div class="pb-20">
						<table class="table stripe hover nowrap" id="purchanseorder">
							<thead>
								<tr class="text-center">
									<th class="table-plus datatable-nosort">S.No</th>
									<th>PO No</th>
									<th>Delivery Date</th>
									<th>Ship Via</th>
									<th>Terms</th>
									<th>Total</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $key => $value )
								<tr class="text-center">
									<td class="table-plus">{{ $key + 1 }}</td>
									<td>{{ $value->po_number }}</td>
									<td>{{ $value->delivery_date }}</td>
									<td>{{ $value->ship_via}}</td>
									<td>{{ $value->terms}}</td>
									<td>{{ $value->total }}</td>
									<td>
										<div class="dropdown">
											<a class="dropdown-item" href="{{ route('purchase-order.show',$value->id) }}"><i class="fa-solid fa-eye"></i></i> View</a>
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
            let table = new DataTable('#purchanseorder', {
                "pageLength": 30,
				"lengthMenu": [30, 50, 100]

            });
        });
        </script>
@endsection
