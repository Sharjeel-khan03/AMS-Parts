@extends('website.layouts.master')
<style>
    .dt-layout-row.dt-layout-table {
        overflow-x: auto;
    }

    table.dataTable th.dt-type-numeric,
    table.dataTable th.dt-type-date,
    table.dataTable td.dt-type-numeric,
    table.dataTable td.dt-type-date {
        text-align: center !important;
    }

    .card-box.mb-30 {
        padding: 0px 16px;
    }

    table.dataTable thead>tr>th.dt-orderable-asc,
    table.dataTable thead>tr>th.dt-orderable-desc,
    table.dataTable thead>tr>td.dt-orderable-asc,
    table.dataTable thead>tr>td.dt-orderable-desc {
        text-align: center;
        cursor: pointer;
    }

    div#orderlist_wrapper {
        /* "Roboto", "sans-serif" */
        font-family: "Roboto", "sans-serif";
    }

    .dt-search {
        display: none;
    }
</style>
@section('content')
    <div class="container">
        <!-- site -->
        <div class="site">
            <!-- site__body -->
            <div class="site__body">

                <div class="block-space block-space--layout--after-header"></div>
                <div class="block">
                    <div class="container container--max--xl">

                        <div class="row">
                            @include('dashboard.sidebar')
                            <div class="col-12 col-lg-10 mt-4 mt-lg-0">
                                <div class="search_bar">
                                    <form action="{{ route('serach-order') }}" method="GET" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-lg-3 mt-4 mt-lg-0">
                                                <div class="vehicle-form__item">
                                                    <input type="text" class="form-control" placeholder="Search"
                                                        aria-label="search" name="search">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-2">
                                                <div class="vehicle-form__item vehicle-form__item--select">
                                                    <select id="all-status" class="form-control" name="status">
                                                        <option value="0">All Statuses</option>
                                                        <option value="1">Order Processing</option>
                                                        <option value="2">Order Shipped</option>
                                                        {{-- <option value="3">Order Placed</option> --}}
                                                        <option value="3">Order Cancel</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-2">
                                                <div class="vehicle-form__item vehicle-form__item--select">
                                                    <input type="date" class="form-control" placeholder="Search"
                                                        aria-label="search" name="start_date">

                                                </div>
                                            </div>
                                            <span class="toText">To</span>
                                            <div class="col-12 col-lg-2">
                                                <div class="vehicle-form__item vehicle-form__item--select">
                                                    <input type="date" class="form-control" placeholder="Search"
                                                        aria-label="search" name="end_date">

                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-2 ">
                                                <div class="vehicle-picker__actions button-style">
                                                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>

                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        disabled>Download</button>

                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="card">


                                    <div class="card-header">
                                        <h5>Order History</h5>
                                    </div>
                                    <div class="card-divider"></div>
                                    <div class="card-table">
                                        <div class="table-responsive-sm">
                                            <table class="table stripe hover nowrap" id="orderlist">
                                                <thead>
                                                    <tr>
                                                        <th>Order Number</th>
                                                        <th>Qoute Number</th>
                                                        <th>Date</th>
                                                        <th>Order Name</th>
                                                        <th>QUANTITY</th>
                                                        <th>UNIT PRICE</th>
                                                        <th>EXTENDED PRICE</th>
                                                        <th>UOM</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($datasearch)
                                                        @if ($datasearch->count() > 0)
                                                            @foreach ($datasearch as $item)
                                                                @php
                                                                    $firstOrderLine = $item->orderLineFront->first();
                                                                    $comissionrate = $firstOrderLine->itemProductFront->unit_price + ($firstOrderLine->itemProductFront->unit_price * $organization->commission_rate / 100);
                                                                    
                                                                @endphp
                                                               

                                                                <tr>
                                                                    <td><a
                                                                            href="{{ route('user-order-details', $item->id) }}">#{{ $item->id }}</a>
                                                                    </td>
                                                                    <td>{{ $firstOrderLine->quote_id ?? 'N/A' }}</td>
                                                                    <td>{{ date_format($item->created_at, 'Y/m/d h:i A') }}</td>
                                                                    @if ($firstOrderLine)
                                                                        <td>{{ $firstOrderLine->itemProductFront->name }}</td>
                                                                        <td>{{ $firstOrderLine->quantity }}</td>
                                                                        <td>
                                                                            @if(Auth::check())
                                                                            ${{ number_format($comissionrate, 2) }}
                                                                            @else
                                                                            ${{ number_format($firstOrderLine->itemProductFront->unit_price, 2) }}
                                                                            @endif
                                                                        </td>
                                                                        <td>$00.00</td>
                                                                        <td>99</td>
                                                                        <td>
                                                                            @if ($item->status == 1)
                                                                                Processing
                                                                            @elseif($item->status == 2)
                                                                                Shipped
                                                                            @else
                                                                                Cancel
                                                                            @endif

                                                                        </td>
                                                                    @endif
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="8">No results found.</td>
                                                            </tr>
                                                        @endif
                                                    @else
                                                        @foreach ($data as $item)
                                                            @php
                                                                $firstOrderLine = $item->orderLineFront->first();
                                                                $comissionrate = $firstOrderLine->itemProductFront->unit_price + ($firstOrderLine->itemProductFront->unit_price * $organization->commission_rate / 100);
                                                                @endphp
                                                              
                                                            <tr>
                                                                <td><a
                                                                        href="{{ route('user-order-details', $item->id) }}">#{{ $item->id }}</a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('user-quotes') }}">
                                                                        {{ $firstOrderLine->quote_id ?? 'N/A' }}
                                                                    </a>
                                                                </td>
                                                                <td>{{ date_format($item->created_at, 'Y/m/d h:i A') }}</td>
                                                                @if ($firstOrderLine)
                                                                    <td>{{ $firstOrderLine->itemProductFront->name }}</td>
                                                                    <td>{{ $firstOrderLine->quantity }}</td>

                                                                    <td>
                                                                        @if(Auth::check())
                                                                        ${{ number_format($comissionrate, 2) }}
                                                                        @else
                                                                        ${{ number_format($firstOrderLine->itemProductFront->unit_price, 2) }}
                                                                        @endif
                                                                    </td>
                                                                    <td>$00.00</td>
                                                                    <td>99</td>
                                                                    <td>
                                                                        @if ($item->status == 1)
                                                                            Processing
                                                                        @elseif($item->status == 2)
                                                                            Shipped
                                                                        @else
                                                                            Cancel
                                                                        @endif
                                                                        {{-- @if ($item->status == 1)
                                                                            Processing
                                                                        @elseif($item->status == 2)
                                                                            Shipped
                                                                        @else
                                                                            Cancel
                                                                        @endif --}}
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                    @endisset

                                                    {{-- @foreach ($data as $key => $item)
                                                        @php
                                                        $firstOrderLine = $item->orderLineFront->first();
                                                    @endphp
                                                    <tr>
                                                        <td><a href="{{ route('user-order-details',$item->id) }}">#{{ $item->id }}</a></td>
                                                        <td>{{date_format($item->created_at,"Y/m/d h:i A") }}</td>
                                                        @if ($firstOrderLine)
                                                        <td>{{ $firstOrderLine->itemProductFront->name }}</td>

                                                            @endif
                                                        <td>{{$firstOrderLine->quantity}}</td>
                                                        <td>${{number_format($firstOrderLine->itemProductFront->unit_price,2) }}</td>
                                                        <td>$00.00</td>
                                                        <td>99</td>
                                                        <td>Pending</td>
                                                    </tr>
                                                    @endforeach --}}

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-divider"></div>
                                    <div class="card-footer">
                                        {{-- {{ $data->links() }} --}}
                                        {{-- <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link page-link--with-arrow" href=""
                                                    aria-label="Previous">
                                                    <span class="page-link__arrow page-link__arrow--left"
                                                        aria-hidden="true"><svg width="7" height="11">
                                                            <path
                                                                d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item active" aria-current="page">
                                                <span class="page-link">
                                                    2
                                                    <span class="sr-only">(current)</span>
                                                </span>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                                            <li class="page-item page-item--dots">
                                                <div class="pagination__dots"></div>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">9</a></li>
                                            <li class="page-item">
                                                <a class="page-link page-link--with-arrow" href="" aria-label="Next">
                                                    <span class="page-link__arrow page-link__arrow--right"
                                                        aria-hidden="true"><svg width="7" height="11">
                                                            <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                                C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-space block-space--layout--before-footer"></div>
            </div>
            <!-- site__body / end -->
        </div>
        <!-- site / end -->

    </div>
    </div>
    <!-- photoswipe / end -->
    <script>
        $(document).ready(function() {
            let table = new DataTable('#orderlist', {
                "pageLength": 30,
                "lengthMenu": [30, 50, 100]

            });
        });
    </script>
@endsection
