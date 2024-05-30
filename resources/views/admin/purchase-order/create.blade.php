@extends('admin.layouts.master')

@section('content')
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<!-- Default Basic Forms Start -->
			<div class="pd-20 card-box mb-30">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-dark h4">Create Purchase Order</h4>
						<p class="mb-30"></p>
					</div>

				</div>
				<form action="{{ route('purchase-order.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="inputEmail4">Vendor</label>
							<select name="vendor_id" class="form-control">
								<option value="">Select Vendor</option>
								@foreach($data['vendors'] as $vendor)
								<option value="{{$vendor->id}}">{{$vendor->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4">Ship To</label>
							<select name="ship_to" class="form-control">
								<option value="">Select Warehouse</option>
								@foreach($data['warehouses'] as $warehouse)
								<option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4">Delivery Date</label>
							<input type="date" name="delivery_date" class="form-control">
						</div>
						<div class="form-group col-md-3">
							<label for="inputPassword4">Requested By</label>
							<input type="text" name="requested_by" class="form-control">
						</div>
						<div class="form-group col-md-3">
							<label for="inputPassword4">Ship Via</label>
							<input type="text" name="ship_via" class="form-control">
						</div>
						<div class="form-group col-md-3">
							<label for="inputPassword4">Terms</label>
							<input type="text" name="terms" class="form-control">
						</div>
						<div class="form-group col-md-3">
							<label for="inputPassword4">Transportation Cost</label>
							<input type="number" name="transportation_cost" class="form-control">
						</div>
						<div class="form-group col-md-12">
							<label for="inputPassword4">Comments</label>
							<textarea style="height: auto;" rows="5" name="comments" class="form-control"></textarea>
						</div>
					</div>
					<br>
					<br>
					<div class="d-flex justify-content-between">
						<h5 class="">Items</h5>
						<div class="">
							<a id="add-items" href="javascript:void(0)" class="btn btn-dark btn-sm">Add Items</a>
						</div>
					</div>
					<br>
					<table class="table stripe hover nowrap ">
						<thead class="bg-dark text-white text-center">
							<tr>
								<th width="5%">S.No</th>
								<th width="35%">Item</th>
								<th width="12%">Qty</th>
								<th width="12%">Cost</th>
								<th width="12%">UOM</th>
								<th width="12%">Total Cost</th>
								<th width="12%">Action</th>
							</tr>
						</thead>
						<tbody id="items-container">
							@if(isset($data->lines))
							@foreach ($data as $key => $value )
							<tr>
								<td>{{ $value->id }}</td>
								<td>{{ $value->vendor_id }}</td>
								<td>{{ $value->ship_to}}</td>
								<td>{{ $value->total }}</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i>Delete</a>
										</div>
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
								<td>Sub Total</td>
								<td id="sub_total">
									<input id="sub_total_field" class="form-control" value="0" type="number" name="sub_total" />
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Shipping</td>
								<td id="shipping_cost">
									<input id="shipping_cost_field" class="form-control" value="0" type="number" name="shipping_cost" onkeyup="calculateSubtotal()" />
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Sales Tax</td>
								<td id="sales_tax">
									<input id="sales_tax_field" class="form-control" value="0" type="number" name="sales_tax" onkeyup="calculateSubtotal()" />
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Total</td>
								<td id="total">
									<input id="total_field" class="form-control" value="0" type="number" name="total" />
								</td>
							</tr>
						</tfoot>
					</table>

					<div class="form-group row">
						<div class="col d-flex justify-content-end">
							<button class="btn btn-dark" type="submit">
								Save
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Default Basic Forms End -->
</div>


<script>
	var items = {!! json_encode($data['items'], JSON_HEX_TAG) !!};
	document.getElementById('add-items').addEventListener('click', function() {
		var index = document.getElementsByClassName('items').length ?? 0;
		var lastSerialNo = index + 1;
		const uniqid = window.crypto.randomUUID();
		console.log('here');
		// document.getElementById('items-container').innerHTML +=
		document.getElementById('items-container').insertAdjacentHTML('beforeend',
			`<tr id="${uniqid}" class="items text-center">
					<td class="serial-no">${lastSerialNo}</td>
					<td>
						<select name="lines[${index}][item_id]" class="form-control item-select" onchange="val(this,'${uniqid}')">
							<option>Select Item</option>
							${items.map((item)=>'<option value="'+item.id+'" data-price="'+item.unit_price+'">'+item.name+'</option>')}
						</select>
					</td>
					<td>
						<input class="form-control" value="" type="number" name="lines[${index}][quantity]" onkeyup="calculateSubtotal()" />
					</td>
					<td>
						<input class="form-control" value="" type="number" name="lines[${index}][cost]" onkeyup="calculateSubtotal()"/>
					</td>
				<td>
				<input class="form-control" value="EA" type="text" name="lines[${index}][uom]" />
					</td>
				<td>
					<input class="form-control" type="number" name="lines[${index}][total_cost]" />
					<input type="hidden" value="pending" name="lines[${index}][status]" />
					<input type="hidden" value="0" name="lines[${index}][receive_qty]" />
					</td>
					<td>
						<a data-id="${uniqid}" href="javascript:void(0)" onclick="removeItem(this)" class="btn btn-danger btn-sm" rel="content-y">Remove</a>
					</td>
			</tr>`);
	});

	function removeItem(event) {
		document.getElementById(event.dataset.id).remove();
		var list = document.getElementsByClassName('serial-no');
		for (let index = 0; index < list.length; index++) {
			list[index].innerHTML = index + 1;
		}
	};

	function val(event, id) {
		document.getElementById(id).children[2].children[0].value = 1;
		document.getElementById(id).children[3].children[0].value = event.options[event.selectedIndex].dataset.price ?? 0;
		calculateSubtotal();
	}

	function calculateSubtotal() {
		var list = document.getElementsByClassName('items');
		var sub_total = 0;
		for (let index = 0; index < list.length; index++) {
			var item_price = parseInt(list[index].children[3].children[0].value || 0);
			var item_quantity = parseInt(list[index].children[2].children[0].value || 0);
			list[index].children[5].children[0].value = item_price * item_quantity;
			sub_total += (item_price * item_quantity);
		}
		document.getElementById('sub_total_field').value = sub_total;
		var shipping_cost = parseInt(document.getElementById('shipping_cost_field').value || 0);
		var sales_tax = parseInt(document.getElementById('sales_tax_field').value || 0);
		document.getElementById('total_field').value = (sub_total + shipping_cost + sales_tax);
	}
</script>
@endsection