@extends('admin.layouts.master')
<link rel="stylesheet" href="{{ asset('admin_assets/vendors/bootstrap.css') }}">
{{-- <link rel="stylesheet" href="{{asset('admin_assets/vendors/fonts_invoice')}}"> --}}

@section('content')
    <div class="main-container">
        <div class="row">
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title flex-grow-1 mb-0">Order #{{ $data->id }}</h5>
                            {{-- <div class="flex-shrink-0">
                                <a href="apps-invoices-details.html" class="btn btn-secondary btn-sm"><i class="ri-download-2-fill align-middle me-1"></i> Invoice</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-nowrap align-middle table-borderless mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col">Product Details</th>
                                        <th scope="col">Item Price</th>
                                        <th scope="col">Custom Price</th>
                                        <th scope="col">Quantity</th>
                                        {{-- <th scope="col">Bulk Quantity</th> --}}
                                        <th scope="col" class="text-end">Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotal = 0;
                                        $tax = 0;
                                        $shipping = 0;
                                    @endphp
                                    @foreach ($data->orderLineFront as $orderLine)
                                        @foreach ($orderLine->itemProductFront->itemImage as $image)
                                            @php
                                                // Determine unit price and total price based on itemQuote existence
                                                $unitPrice = $orderLine->itemQuote ? $orderLine->itemQuote->custome_price : $orderLine->itemProductFront->unit_price;
                                                $totalPrice = $unitPrice * $orderLine->quantity;

                                                // Add to subtotal if itemQuote exists
                                                if ($orderLine->itemQuote) {
                                                    $subtotal += $totalPrice;
                                                } else {
                                                    $subtotal += $orderLine->itemProductFront->unit_price * $orderLine->quantity;
                                                }
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 avatar-md bg-light p-1">
                                                            <img src="{{ optional($image)->image ? asset($image->image) : asset('admin_assets/no-image.jpg') }}" alt=""
                                                                 class="img-fluid d-block">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h5 class="fs-16">{{ $orderLine->itemProductFront->name }}</h5>
                                                            <p class="text-muted mb-0">Part No: <span class="fw-medium">{{ $orderLine->itemProductFront->part_no }}</span></p>
                                                            <p class="text-muted mb-0">Description: <span class="fw-medium">{{ Str::limit($orderLine->itemProductFront->description, 10, ' ...') }}</span></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>${{ number_format($orderLine->itemProductFront->unit_price, 2) ?? 'N/A' }}</td>
                                                <td>
                                                    @if ($orderLine->itemQuote)
                                                        ${{ number_format($orderLine->itemQuote->custome_price, 2) ?? 'N/A' }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>{{ $orderLine->quantity ?? 'N/A' }}</td>
                                                <td class="fw-medium text-end">
                                                    @if ($orderLine->itemQuote)
                                                        ${{ number_format($totalPrice, 2) }}
                                                    @else
                                                        ${{ number_format($orderLine->itemProductFront->unit_price * $orderLine->quantity, 2) }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach

                                    <tr class="border-top border-top-dashed">
                                        <td colspan="3"></td>
                                        <td colspan="2" class="fw-medium p-0">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Sub Total :</td>
                                                        <td class="text-end">${{ number_format($subtotal, 2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping Charge :</td>
                                                        <td class="text-end">${{ number_format($shipping, 2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Estimated Tax :</td>
                                                        <td class="text-end">${{ number_format($tax, 2) }}</td>
                                                    </tr>
                                                    <tr class="border-top border-top-dashed">
                                                        <th scope="row">Total:</th>
                                                        <th class="text-end">${{ number_format($subtotal + $shipping + $tax, 2) }}</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="card-title flex-grow-1 mb-0">Order Status</h5>
                            <div class="flex-shrink-0 mt-2 mt-sm-0">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#statusModal"
                                    style="bottom: 10px;
                                position: relative;">
                                    Order Status
                                </button>
                                {{-- <a href="javascript:void(0);" class="btn btn-soft-info btn-sm mt-2 mt-sm-0"><i class="ri-map-pin-line align-bottom me-1"></i> Change Address</a> --}}
                                {{-- <a href="javascript:void(0);" class="btn btn-soft-danger btn-sm mt-2 mt-sm-0"><i class="mdi mdi-archive-remove-outline align-bottom me-1"></i> Cancel
                                    Order</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="profile-timeline">
                            <div class="accordion accordion-flush" id="accordionFlushExample">

                                @if ($data->status >= 1)
                                    <div class="accordion-item border-0">
                                        <div class="accordion-header" id="headingOne">
                                            <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                                href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 avatar-xs">
                                                        <div class="avatar-title bg-success rounded-circle">
                                                            <i class="ri-shopping-bag-line"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="fs-15 mb-0 fw-semibold">Order Placed - <span
                                                                class="fw-normal">{{ date_format($data->created_at, 'Y/m/d') }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body ms-2 ps-5 pt-0">
                                                <h6 class="mb-1">An order has been placed.</h6>
                                                <p class="text-muted">{{ date_format($data->created_at, 'Y/m/d h:i A') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($data->status >= 2)
                                    <div class="accordion-item border-0">
                                        <div class="accordion-header" id="headingTwo">
                                            <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                                href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 avatar-xs">
                                                        <div class="avatar-title bg-success rounded-circle">
                                                            <i class="mdi mdi-gift-outline"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="fs-15 mb-0 fw-semibold">Shipping - <span
                                                                class="fw-normal">{{ date_format($data->updated_at, 'Y/m/d') }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="collapseTwo" class="accordion-collapse collapse show"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body ms-2 ps-5 pt-0">
                                                <h6 class="mb-1">Your item has been Shipped.</h6>
                                                <p class="text-muted">{{ date_format($data->updated_at, 'Y/m/d h:i A') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($data->status >= 3)
                                    <div class="accordion-item border-0">
                                        <div class="accordion-header" id="headingThree">
                                            <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                                href="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 avatar-xs">
                                                        <div class="avatar-title bg-success rounded-circle">
                                                            <i class="ri-truck-line"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="fs-15 mb-0 fw-semibold">Cancelled - <span
                                                                class="fw-normal">{{ date_format($data->updated_at, 'Y/m/d') }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="collapseThree" class="accordion-collapse collapse show"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body ms-2 ps-5 pt-0">
                                                <h6 class="mb-1">Your item has been Cancelled.</h6>
                                                <p class="text-muted">{{ date_format($data->updated_at, 'Y/m/d h:i A') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                {{-- @if ($data->status >= 4)
                                <div class="accordion-item border-0">
                                    <div class="accordion-header" id="headingFour">
                                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 avatar-xs">
                                                    <div class="avatar-title bg-light text-success rounded-circle">
                                                        <i class="ri-takeaway-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="fs-14 mb-0 fw-semibold">Out For Delivery</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endif --}}

                                {{-- @if ($data->status == 5)
                                <div class="accordion-item border-0">
                                    <div class="accordion-header" id="headingFive">
                                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 avatar-xs">
                                                    <div class="avatar-title bg-light text-success rounded-circle">
                                                        <i class="mdi mdi-package-variant"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="fs-14 mb-0 fw-semibold">Cancelled</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endif --}}

                            </div>
                            <!--end accordion-->
                        </div>
                    </div>

                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <h2 class="card-title flex-grow-1 mb-0">
                                {{-- <span class="micon bi bi-people-fill"></span> --}}
                                {{-- <i class="mdi mdi-truck-fast-outline align-middle me-1 text-muted"></i> --}}
                                Logistics Details</h2>
                            {{-- <div class="flex-shrink-0">
                                <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary fs-12">Track
                                    Order</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/uetqnvvg.json" trigger="loop"
                                colors="primary:#405189,secondary:#0ab39c" style="width:80px;height:80px">
                            </lord-icon>
                            <h5 class="fs-17 mt-2">Logistics</h5>
                            <p class="text-muted mb-0">ID: MFDS1400457854</p>
                            <p class="text-muted mb-0">Payment Mode : Debit Card</p>
                        </div>
                    </div>
                </div>
                <!--end card-->

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">
                                Customer Details
                            </h5>
                            {{-- <div class="flex-shrink-0">
                                <a href="javascript:void(0);" class="link-secondary">View Profile</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0 vstack gap-3">
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('admin_assets/vendors/images/photo1.jpg') }}" alt=""
                                            class="avatar-sm rounded">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="fs-15 mb-1">{{ $data->user->user_name ?? 'N/A' }}</h6>
                                        <p class="text-muted mb-0">Customer</p>
                                    </div>
                                </div>
                            </li>
                            <li><i
                                    class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{ $data->user->email ?? 'N/A' }}
                            </li>
                            <li><i
                                    class="ri-phone-line me-2 align-middle text-muted fs-16"></i>{{ $data->user->contact ?? 'N/A' }}
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Billing
                            Address
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled vstack gap-2 mb-0">
                            <li class="fw-medium fs-15">{{ $data->user->user_name ?? 'N/A' }}</li>
                            <li>{{ $data->user->contact ?? 'N/A' }}</li>
                            <li>{{ $data->user->address ?? 'N/A' }}</li>
                            <li>{{ $data->user->city ?? 'N/A' }} - {{ $data->user->zipcode ?? 'N/A' }}</li>
                            <li>{{ $data->user->country ?? 'N/A' }}</li>
                        </ul>
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Shipping
                            Address
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled vstack gap-2 mb-0">
                            <li class="fw-medium fs-15">{{ $data->user->user_name ?? 'N/A' }}</li>
                            <li>{{ $data->user->contact ?? 'N/A' }}</li>
                            <li>{{ $data->shippingAddress->shipping_address ?? 'N/A' }}</li>
                            <li>{{ $data->shippingAddress->shipping_state ?? 'N/A' }} -
                                {{ $data->shippingAddress->shipping_zipcode ?? 'N/A' }}</li>
                            <li>{{ $data->user->country ?? 'N/A' }}</li>
                        </ul>
                    </div>
                </div>
                <!--end card-->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            {{-- <i class="ri-secure-payment-line align-bottom me-1 text-muted"></i>     --}}
                            Payment Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Transactions:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">#VLZ12456127</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Payment Method:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">Debit Card</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Card Holder Name:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">Joseph Parker</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Card Number:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">xxxx xxxx xxxx 2456</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Total Amount:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">$415.96</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>


    {{-- modal for status change --}}

    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Change Order Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"eb>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="" action="{{ route('changeStatus') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label for="statusDropdown">Select Order Status</label>
                            <select class="form-control" id="statusDropdown" name="order_status">
                                <option value="">Select Order Status</option>
                                <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Order Processing
                                </option>
                                <option value="2" {{ $data->status == 2 ? 'selected' : '' }}>Order Shipped</option>
                                {{-- <option value="3">Order Placed</option> --}}
                                <option value="3" {{ $data->status == 3 ? 'selected' : '' }}>Order Cancel</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end --}}

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
