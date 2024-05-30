@extends('admin.layouts.master')

@section('content')
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<!-- Default Basic Forms Start -->
			<div class="pd-20 card-box mb-30">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-dark h4">Purchase Order Detail</h4>
						<p class="mb-30"></p>
					</div>

				</div>
				<form action="{{ route('purchase-order.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="inputEmail4">PO No</label>
							<p>{{$data->po_number}}</p>
						</div>
						<div class="form-group col-md-4">
							<label for="inputEmail4">Vendor</label>
							<p>Vendor {{$data->vendor->name}}</p>
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4">Ship To</label>
							<p>Warehouse {{$data->warehouse->name}}</p>
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4">Delivery Date</label>
							<p>{{$data->delivery_date}}</p>
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4">Requested By</label>
							<p>{{$data->requested_by}}</p>
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4">Ship Via</label>
							<p>{{$data->ship_via}}</p>
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4">Terms</label>
							<p>{{$data->terms}}</p>
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword4">Comments</label>
							<p>{{$data->comments}}</p>
						</div>
					</div>
					<br>
					<br>
					<div class="d-flex justify-content-between">
						<h5 class="">Items</h5>
					</div>
					<br>
					<table class="table stripe hover nowrap ">
						<thead class="bg-dark text-white text-center">
							<tr>
								<th width="5%">S.No</th>
								<th width="30%">Item</th>
								<th width="10%">Qty</th>
								<th width="15%">Receive Qty</th>
								<th width="10%">Cost</th>
								<th width="10%">UOM</th>
								<th width="12%">Total Cost</th>
								<th width="12%">Status</th>
								<th width="10%">Action</th>
							</tr>
						</thead>
						<tbody id="items-container">
							@if(isset($data->lines))
							@foreach ($data->lines as $key => $value )
							<tr class="text-center">
								<td>{{ $value->id }}</td>
								<td>{{ $value->item->name }}</td>
								<td>{{ $value->quantity}}</td>
								<td>{{ $value->receive_qty}}</td>
								<td>$ {{ $value->cost }}</td>
								<td>{{ $value->uom }}</td>
								<td>{{ $value->total_cost }}</td>
								<td><span class="badge {{$value->status == 'pending' ? 'badge-info' : ($value->status == 'in-progress' ? 'badge-warning' : 'badge-success')}}">{{$value->status}}</span></td>
								<td>
									<div class="dropdown">
										<a data-quantity="{{$value->quantity}}" data-receive_qty="{{$value->receive_qty}}" data-item="{{$value->item->name}}" data-line_id="{{$value->id}}" onclick="setLineId(this)" data-toggle="modal" data-target="#receiveModal" class="{{$value->status == 'completed' ? 'disabled': ''}} dropdown-item" href="javascript:void(0)"><i class="fa-solid fa-box"></i></i> Receive</a>
									</div>
								</td>
							</tr>
							@endforeach
							@endif
						</tbody>
						<tfoot class="text-center">
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Sub Total</td>
								<td id="sub_total">
									{{$data->sub_total}}
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Shipping</td>
								<td id="shipping_cost">
									{{$data->shipping_cost}}
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Sales Tax</td>
								<td id="sales_tax">
									{{$data->sales_tax}}
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Total</td>
								<td id="total">
									{{$data->total}}
								</td>
							</tr>
						</tfoot>
					</table>

					<div class="form-group row">
						<div class="col d-flex justify-content-end">
							<!-- <button class="btn btn-dark" type="submit">
										Save
									</button> -->
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Default Basic Forms End -->
</div>

<div class="modal fade" id="receiveModal" tabindex="-1" role="dialog" aria-labelledby="receiveModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="{{ route('purchase-order.receive') }}" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title" id="receiveModalLabel">Receive Quantity</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					@csrf
					<div class="form-row">
						<div class="form-group col-md-12">
							<label>Item Name</label>
							<p id="item"></p>
						</div>
						<div class="form-group col-md-6">
							<label>Total Quantity To Receive</label>
							<p id="quantity"></p>
						</div>
						<div class="form-group col-md-6">
							<label>Total Received Quantity</label>
							<p id="receive_qty"></p>
						</div>
						<div class="form-group col-md-12">
							<label>Receive Quantity</label>
							<input type="text" class="form-control" name="receive_qty">
							<input id="line_id" type="hidden" class="form-control" name="line_id">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-dark">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
	function setLineId(event) {
		document.getElementById('line_id').value = event.dataset.line_id;
		document.getElementById('item').innerHTML = event.dataset.item;
		document.getElementById('quantity').innerHTML = event.dataset.quantity;
		document.getElementById('receive_qty').innerHTML = event.dataset.receive_qty;
	};
</script>
@endsection