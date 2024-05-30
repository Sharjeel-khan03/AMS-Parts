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

div#quotelist_wrapper {
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
						<h4 class="">Quote List</h4>

						<div class="">
							{{-- <a href="{{route('quote.create') }}" class="btn btn-dark btn-sm" rel="content-y"
								>+ Create</a> --}}
						</div>

					</div>

					<div class="pb-20">
						<table class="table stripe hover nowrap" id="quotelist">
							<thead>
								<tr class="text-center">
									<th class="table-plus datatable-nosort">Quote Number</th>
									<th class="table-plus datatable-nosort">Created Date</th>
									<th>User Name</th>
									<th>Item Name</th>
									<th>Bulk Quantity</th>
									<th>Custome Price</th>
									<th>Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $key => $quote )
								@foreach ($quote->user as $key => $user )
								@foreach ($quote->item as $key => $item )
								<tr class="text-center">
									<td class="table-plus">Q-{{ $quote->id }}</td>
									<td class="table-plus">{{date_format($quote->created_at,"Y/m/d h:i A") }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $item->name }}</td>
									<td>{{ $quote->quantity }}</td>
									<td>{{ $quote->custome_price }}</td>
                                    <td>
                                        @if($quote->status == 1)
                                        Pending
                                        @elseif($quote->status == 2)
                                        Accepted
										{{-- @elseif($quote->status == 3)
                                        Company Offer --}}
                                        @else
                                        Cancel Quote
                                        @endif
                                    </td>
									<td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            {{-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="{{ route('quote.edit',$quote->id) }}"><i class="dw dw-edit2"></i> Edit</a>
                                                <form id="destory" action="{{route('quotesub-categories.destroy',$quote->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i>
                                                    Delete</a>
													<a class="dropdown-item" href="{{ route('quote.show',$quote->id) }}"><i class="fa-solid fa-eye"></i></i> View</a>
                                            </div> --}}
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="{{ route('quote.edit',$quote->id) }}"><i class="dw dw-edit2"></i> Edit</a>
                                                <a class="dropdown-item" href="{{ route('quote.show',$quote->id) }}"><i class="fa-solid fa-eye"></i></i> View</a>
                                                <form id="destory" action="{{route('quote.destroy',$quote->id)}}" method="POST">
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
								@endforeach
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
            let table = new DataTable('#quotelist', {
                "pageLength": 30,
				"lengthMenu": [30, 50, 100]

            });
        });
        </script>
@endsection
