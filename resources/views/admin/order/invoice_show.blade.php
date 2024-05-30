@extends('admin.layouts.master')
<style>


body {
    margin: 0;
    padding: 0;
    background-color: #f5f5f5 !important;
    /* font-family: "poppins-regular" !important; */
    font-family: "Inter", sans-serif !important;
}

p {
    margin-bottom: 0px !important;
    font-size: 12px !important;
}

::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background-color: #474747;
    border-radius: 50px;
}

::selection {
    background: #000000;
    color: #ffffff;
}

.infoDetailsBox {
    margin: 32px 0px 24px 0px;
    padding: 0px 10px;
}

.paymentDetail {
    padding: 0px 24px;
}

.paymentDetail hr {
    height: 4px !important;
    width: 100%;
    background-color: #0000005e;
    margin: 20px 0px;
}

.paymentForm label {
    font-family: "poppins-medium";
    color: #676767;
}

.paymentForm input {
    font-family: "poppins-regular";
    color: #676767;
    margin-bottom: 16px;
}

.form-control:focus {
    box-shadow: unset !important;
    border-color: #464668;
}


.customWidth {
    width: 80% !important;
    margin: auto;
    background-color: #ffffff;
    padding: 20px 0px;
    font-family: "Inter", sans-serif !important;
    box-shadow: 0 20px 25px -5px rgb(0 0 0 / .1), 0 8px 10px -6px rgb(0 0 0 / .1);
}

.table>:not(caption)>*>* {
    background-color: #ffffff !important;
}

.logoImage {
    width: 150px;
    height: 55px;
    overflow: hidden;
    margin: 10px 0px;
}

.logoImage img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.infoDetails h5 {
    font-family: "poppins-semibold";
    color: #6D6E71;
    margin-bottom: 0px;
}

.infoDetails h4 {
    font-family: "poppins-semibold";
    color: #464668;
    margin-bottom: 12px;
}

.invoiceNo h4 {
    font-family: "poppins-semibold";
    color: #464668;
    text-align: start;
}

.infoDetails span {
    font-family: "poppins-medium";
    color: #6D6E71;
    margin-bottom: 8px;
}

.infoDetails p {
    font-family: "poppins-regular";
    color: #6D6E71;
    margin-bottom: 8px;
}

.invoiceNo {
    text-align: end;
    margin: 12px 0px 24px 0px;
}

.invoiceNo h2 {
    text-transform: capitalize;
    font-family: "poppins-semibold";
    color: #6D6E71;
    font-size: 16px;
}

.invoiceNo h2 span {
    font-size: 14px;
    text-align: start;
    text-transform: capitalize;
    font-family: "poppins-regular";
    margin-top: 8px;
    display: inline-block;
}


.invoiceTable {
    margin: 32px 0px 24px 0px;
    position: relative;
    padding: 0px 10px;
}

.grandTotal {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 14px 0px;
}

.grandTotal h5 {
    margin-bottom: 0px;
    font-size: 16px;
    font-family: "poppins-semibold";
    color: #676767;
}

.invoiceTable hr {
    height: 4px !important;
    width: 100%;
    background-color: #0000005e;
    margin: 20px 0px;
}

button.downloadbutton {
    border: none;
    background-color: #464668;
    padding: 6px 12px;
    border-radius: 6px;
    font-family: "poppins-regular";
    font-size: 14px;
    margin-top: 16px;
}

.invoiceTable thead {
    font-family: "poppins-regular";
    background: #ffffff;
    color: #000000;
    font-size: 14px;
}

.invoiceTable tbody tr {
    background-color: #f2f2f2;
    /* font-family: "poppins-regular"; */
    color: #000000;
    /* border-bottom: 6px solid #ffffff; */
    font-size: 12px;
}

.invoiceTable tbody tr td p {
    margin-bottom: 0px;
    color: #000000;
}

.invoiceTable tfoot tr {
    /* font-family: "poppins-medium"; */
    color: #000000;
    font-size: 12px;
}

.invoiceTable tfoot tr td.grandTotal {
    background-color: #464668;
    color: #ffffff;
}

.invoiceTable tfoot tr td h6 {
    margin-bottom: 0px;
}


.invoiceTable .table>:not(caption)>*>* {
    border-bottom-width: 0px !important;
    padding: 8px 0px !important;
}

table.table {
    margin-bottom: 0px;
    text-align: center;
}

.textEnd {
    text-align: end;
}

.ship span {
    font-size: 14px;
}

.ship p {
    width: 65%;
}
        </style>
{{-- <link rel="stylesheet" href="{{ asset('admin_assets/vendors/bootstrap.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{asset('admin_assets/vendors/fonts_invoice')}}"> --}}

@section('content')
    <div class="main-container">
        <section class="invoicePage">

            <div class="container-fluid customWidth">
                <div class="infoDetailsBox">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="logoImage">
                                <img src="{{ asset('admin_assets/vendors/images/AMSLogo.png') }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="top-detail">
                                {{-- billing address --}}
                                <p>
                                    {{ $data->user->address ?? 'N/A' }}
                                    {{ $data->user->city ?? 'N/A' }},{{ $data->user->zipcode ?? 'N/A' }},
                                    {{ $data->user->country ?? 'N/A' }}
                                </p>
                                    <p><b>Phone:</b> {{ $data->user->contact ?? 'N/A' }}</p>
                                    {{-- <p><b>Fax:</b> (514) 788-3375</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="top-detail textEnd">
                                <div class="row">
                                    <div class="col-lg-12"><h2>Invoice</h2></div>
                                    <div class="col-lg-6"><span><p>Date</p><p>{{ date_format($data->created_at, 'Y/m/d h:i A') }}</p></span></div>
                                    {{-- <div class="col-lg-6"><span><p>Page</p><p>1</p></span></div> --}}
                                    <div class="col-lg-12"><span><p>Invoice Number</p><p>#{{$data->id }}</p></span></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                            <div class="ship">
                                <span><b>Sold To:</b></span>
                                <p>{{$data->user->user_name ?? 'N/A'}}
                                    {{ $data->user->address ?? 'N/A' }}
                                {{ $data->user->state ?? 'N/A' }},{{ $data->user->zipcode ?? 'N/A' }}
                                {{ $data->user->country ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                            <div class="ship">
                                <span><b>Ship To:</b></span>
                                <p>{{$data->user->user_name ?? 'N/A'}}
                                    {{ $data->shippingAddress->shipping_address ?? 'N/A' }}
                                {{ $data->shippingAddress->shipping_state ?? 'N/A' }},{{ $data->shippingAddress->shipping_zipcode ?? 'N/A' }}
                                {{ $data->user->country ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12 mt-5 text-center">
                            <div class="row">
                                <div class="col-lg-3"><span><p><b>Ship Via</b></p><p>UPS Standard</p></span></div>
                                <div class="col-lg-3"><span><p><b>Order Number</b></p><p>{{$data->id}}</p></span></div>
                                <div class="col-lg-3"><span><p><b>Date</b></p><p>{{ date_format($data->created_at, 'Y/m/d h:i A') }}</p></span></div>
                                <div class="col-lg-3"><span><p><b>Sales Rep</b></p><p>RD</p></span></div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 mt-5 text-center">
                            <div class="row">
                                <div class="col-lg-4"><span><p><b>PO Number</b></p><p>99000</p></span></div>
                                <div class="col-lg-4"><span><p><b>Currency</b></p><p>CAD</p></span></div>
                                <div class="col-lg-4"><span><p><b>Terms</b></p><p>Net 30</p></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoiceTable">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Item Number</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">UOM</th>
                                        <th scope="col">Extended Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $subtotal = 0;
                                    $tax = 0;
                                    $Shipping = 0;

                                @endphp
                                @foreach ($data->orderLineFront as $orderLine)
                                    @foreach ($orderLine->itemProductFront->itemImage as $image)
                                        @php
                                            $subtotal +=
                                                $orderLine->itemProductFront->unit_price * $orderLine->quantity;
                                        @endphp
                                        <tr>
                                            <td>{{ $orderLine->itemProductFront->id}}</td>
                                            <td><p>{{  $orderLine->itemProductFront->name}}</p></td>
                                            <td>${{ number_format($orderLine->itemProductFront->unit_price, 2) }}</td>
                                            <td>{{ $orderLine->quantity }}</td>
                                            <td>EA</td>
                                            <td>0.00</td>
                                        </tr>
                                     @endforeach
                                    @endforeach
                                        <td style="border-top: 0px solid #dee2e6;"></td>
                                    </tr>
                                </tbody>
                                <tfoot class="tfoot">
                                    <tr>
                                        <td>Comments:</td>
                                        <td>GST No: 853833663RT0001</td>
                                        <td colspan="3">Sub Total</td>
                                        <td>${{ number_format($subtotal, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>UPS tracking #0001</td>
                                        <td>QST No: 1215550211TQ0001</td>
                                        <td colspan="3">Shipping</td>
                                        <td>${{ number_format($Shipping, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: end;"></td>
                                        <td colspan="3">Tax 5%</td>
                                        <td >${{ number_format($tax, 2) }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td colspan="2"></td>
                                        <td colspan="3">QST 9.975%</td>
                                        <td>28.83</td>
                                    </tr> --}}
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="3">Total (CAD)</td>
                                        <td>${{ number_format($subtotal + $Shipping + $tax, 2) }}</td>
                                    </tr>
                                    <!-- <tr>
                                        <td colspan="5"></td>
                                        <td>Discount</td>
                                        <td>10%</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td>Total</td>
                                        <td>$1000</td>
                                    </tr> -->
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </section>
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
                    <form id="" action="{{route('changeStatus')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="order_id" value="{{$data->id}}">
                        <div class="form-group">
                            <label for="statusDropdown">Select Order Status</label>
                            <select class="form-control" id="statusDropdown" name="order_status">
                                <option value="" >Select Order Status</option>
                                <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Order Processing</option>
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
