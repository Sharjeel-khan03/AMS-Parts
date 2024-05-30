@extends('website.layouts.master')
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
    /* "Roboto", "sans-serif" */
    font-family: "Roboto", "sans-serif";
}
.dt-search{
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
                                    <form action="{{ route('serach-quote') }}" method="GET" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-lg-3 mt-4 mt-lg-0">
                                                <div class="vehicle-form__item">
                                                    <input type="text" class="form-control" placeholder="Search"
                                                        aria-label="search" name="search">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-3">
                                                <div class="vehicle-form__item vehicle-form__item--select">
                                                    <input type="date" class="form-control" placeholder="Search"
                                                        aria-label="search" name="start_date">

                                                </div>
                                            </div>
                                            <span class="toText">To</span>
                                            <div class="col-12 col-lg-3">
                                                <div class="vehicle-form__item vehicle-form__item--select">
                                                    <input type="date" class="form-control" placeholder="Search"
                                                        aria-label="search" name="end_date">

                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-2 ">
                                                <div class="vehicle-picker__actions button-style">
                                                    <button type="submit" class="btn btn-primary btn-sm" >Filter</button>

                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        disabled>Download</button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5>User Quotes</h5>
                                    </div>
                                    <div class="card-divider"></div>
                                    <div class="card-table">
                                        <div class="table-responsive-sm">
                                            <table class="table stripe hover nowrap" id="quotelist">
                                                <thead>
                                                    <tr>
                                                        <th>Quote Number</th>
                                                        <th>Created Date</th>
                                                        <th>Quote Name</th>
                                                        <th>Item Price</th>
                                                        <th>Custom Price</th>
                                                        <th>Company Offer</th>
                                                        <th>Status</th>
                                                        <th>change Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $subcomissionrate = 0;
                                                    @endphp
                                                    @isset($datasearch)
                                                        @if ($datasearch->count() > 0)
                                                            @foreach ($datasearch as $quote)
                                                                @foreach ($quote->item as $key => $item)
                                                                    <tr>
                                                                        <td><a
                                                                                href="{{ route('user-quote-details', $quote->id) }}">#{{ $quote->id }}</a>
                                                                        </td>
                                                                        <td>{{ date_format($quote->created_at, 'Y/m/d h:i A') }}
                                                                        </td>
                                                                        <td>{{ $item->name }}</td>
                                                                        <td>${{ number_format($item->unit_price, 2) }}</td>
                                                                        <td>${{ number_format($quote->custome_price, 2) }}</td>
                                                                        <td>
                                                                            @if ($quote->company_offer == null)
                                                                            @else
                                                                                ${{ number_format($quote->company_offer, 2) }}
                                                                            @endif

                                                                        </td>
                                                                        <td>
                                                                            @if ($quote->status == 1)
                                                                                Pending
                                                                            @elseif($quote->status == 2)
                                                                            Accepted

                                                                            @else
                                                                                Cancel Quote
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <form action="{{ 'status_update' }}" method="POST"
                                                                                enctype="multipart/form-data"
                                                                                id="statusForm-{{ $quote->id }}">
                                                                                @csrf
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $quote->id }}">
                                                                                <div class="dropdown">
                                                                                    <select
                                                                                        id="address-country-{{ $quote->id }}"
                                                                                        class="form-control" name="status"
                                                                                        onchange="submitForm('{{ $quote->id }}')"
                                                                                        {{ in_array($quote->status, [2, 4]) ? 'disabled' : '' }}>
                                                                                        <option value="" selected>Select a
                                                                                            Action
                                                                                        </option>
                                                                                        <option value="2"
                                                                                            {{ $quote->status == 2 ? 'selected' : '' }}>
                                                                                            Accepted</option>
                                                                                        {{-- <option value="3"
                                                                                            {{ $quote->status == 3 ? 'selected' : '' }}>
                                                                                            Place Order</option> --}}
                                                                                        <option value="4"
                                                                                            {{ $quote->status == 4 ? 'selected' : '' }}>
                                                                                            Cancel Quote</option>
                                                                                    </select>
                                                                                </div>
                                                                                {{-- <button id="hidden-button" type="submit" style="display: none;"></button> --}}
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="8">No results found.</td>
                                                            </tr>
                                                        @endif
                                                    @else
                                                        @foreach ($data as $key => $quote)
                                                            @foreach ($quote->item as $key => $item)
                                                            @php
                                                               $comissionrate = $item->unit_price + ($item->unit_price * $organization->commission_rate / 100);
                                                            @endphp
                                                                <tr>
                                                                    <td><a
                                                                            href="{{ route('user-quote-details', $quote->id) }}">#{{ $quote->id }}</a>
                                                                    </td>
                                                                    <td>{{ date_format($quote->created_at, 'Y/m/d h:i A') }}
                                                                    </td>
                                                                    <td>{{ $item->name }}</td>
                                                                    <td>
                                                                    @if(Auth::check())
                                                                    ${{ number_format($comissionrate, 2) }}
                                                                    @else
                                                                        ${{ number_format($item->unit_price, 2) }}
                                                                        @endif
                                                                    
                                                                    </td>
                                                                    <td>${{ number_format($quote->custome_price, 2) }}</td>
                                                                    <td>
                                                                        @if ($quote->company_offer == null)
                                                                        @else
                                                                            ${{ number_format($quote->company_offer, 2) }}
                                                                        @endif

                                                                    </td>
                                                                    <td>
                                                                        @if ($quote->status == 1)
                                                                            Pending
                                                                        @elseif($quote->status == 2)
                                                                        Accepted
                                                                        {{-- @elseif($quote->status == 3)
                                                                            Place Order --}}
                                                                        @else
                                                                            Cancel Quote
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <form action="{{ 'status_update' }}" method="POST"
                                                                            enctype="multipart/form-data"
                                                                            id="statusForm-{{ $quote->id }}">
                                                                            @csrf
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $quote->id }}">
                                                                                <div class="dropdown">
                                                                                    <select
                                                                                        id="address-country-{{ $quote->id }}"
                                                                                        class="form-control" name="status"
                                                                                        onchange="submitForm('{{ $quote->id }}')"
                                                                                        {{ in_array($quote->status, [2, 4]) ? 'disabled' : '' }}>
                                                                                        <option value="" selected>Select a
                                                                                            Action
                                                                                        </option>
                                                                                        <option value="2"
                                                                                            {{ $quote->status == 2 ? 'selected' : '' }}>
                                                                                            Accepted</option>
                                                                                        <option value="4"
                                                                                            {{ $quote->status == 4 ? 'selected' : '' }}>
                                                                                            Cancel Quote</option>
                                                                                    </select>
                                                                            </div>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-divider"></div>
                                        {{-- <div class="card-footer">
                                            <ul class="pagination">
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
                                                    <a class="page-link page-link--with-arrow" href=""
                                                        aria-label="Next">
                                                        <span class="page-link__arrow page-link__arrow--right"
                                                            aria-hidden="true"><svg width="7" height="11">
                                                                <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                                                        -0.1,9.8-0.1,10.4,0.3,10.7z" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-space block-space--layout--before-footer"></div>
                </div>
                <!-- site__body / end -->
            </div>

        </div>
        </div>

        <script>
            function submitForm(quoteId) {
                var form = document.getElementById('statusForm-' + quoteId);
                form.submit();
            }
        </script>
        <script>
            $(document).ready(function(){
                let table = new DataTable('#quotelist', {
                    "pageLength": 30,
                    "lengthMenu": [30, 50, 100]

                });
            });
            </script>
    @endsection
