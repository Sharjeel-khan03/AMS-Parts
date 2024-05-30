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

div#subcategory_wrapper {
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
					<h4 class="">Sub Category List</h4>

					<div class="">
						<a href="{{route('sub-categories.create') }}" class="btn btn-dark btn-sm" rel="content-y">+ Create</a>
					</div>

				</div>

				<div class="pb-20">
					<table class=" table stripe hover nowrap" id="subcategory">
						<thead>
							<tr class="text-center">
								<th class="table-plus datatable-nosort">S.No</th>
								<th>Category Name</th>
								<th>Sub Category Name</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $key => $subcategory )
							<tr class="text-center">
								<td class="table-plus">{{ $key + 1 }}</td>
								<td>{{ $subcategory->category->name ?? 'Not Category Assigned'}}</td>
								<td>{{ $subcategory->name }}</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="{{ route('sub-categories.edit',$subcategory->id) }}"><i class="dw dw-edit2"></i> Edit</a>
											<form id="destory" action="{{route('sub-categories.destroy',$subcategory->id)}}" method="POST">
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
        let table = new DataTable('#subcategory', {
                "pageLength": 30,
				"lengthMenu": [30, 50, 100]

            });
    });
    </script>
@endsection
