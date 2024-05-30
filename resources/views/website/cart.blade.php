@extends('website.layouts.master')
@section('content')
<div class="site__body">
    <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                            <a href="index.html" class="breadcrumb__item-link">Home</a>
                        </li>
                        <li class="breadcrumb__item breadcrumb__item--parent">
                            <a href="" class="breadcrumb__item-link">Breadcrumb</a>
                        </li>
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                            <span class="breadcrumb__item-link">Current Page</span>
                        </li>
                        <li class="breadcrumb__title-safe-area" role="presentation"></li>
                    </ol>
                </nav>
                <h1 class="block-header__title">Shopping Cart</h1>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container">
            <div class="cart">
                <div class="cart__table cart-table">
                    <table class="cart-table__table">
                        <thead class="cart-table__head">
                            <tr class="cart-table__row">
                                <th class="cart-table__column cart-table__column--image">Image</th>
                                <th class="cart-table__column cart-table__column--product">Product</th>
                                <th class="cart-table__column cart-table__column--price">Price</th>
                                <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                                <th class="cart-table__column cart-table__column--total">Total</th>
                                <th class="cart-table__column cart-table__column--remove"></th>
                            </tr>
                        </thead>
                        <tbody class="cart-table__body">
                            @php
                            $subtotal =  0;
                            $tax = 0;
                            $shipping = 0;
                            $subcomissionrate = 0;
                            @endphp
                            @foreach ($cartItems as $itemid => $value)
                            @php
                            $items = App\Models\Item::with('ItemImageFront')->find($itemid);
                            $subtotal += isset($items->unit_price) ? $items->unit_price *  $value['quantity'] : 0;
                            if(Auth::check()){
                                $catitem =  App\Models\ItemCategory::where('item_id',$itemid)->first();
                                 $cat =  App\Models\OrganizationUser::where('category_id',$catitem->category_id)->first();
                                $subcomissionrate += $items->unit_price + ($items->unit_price * $cat->organization->commission_rate / 100);
                            }

                            @endphp
                            <tr class="cart-table__row"  data-item-id="{{ $itemid }}">
                                <td class="cart-table__column cart-table__column--image">
                                    <div class="image image--type--product">
                                        <a href="product-full.html" class="image__body">
                                            <img class="image__tag" src="{{ optional($items->ItemImageFront)->image ? asset($items->ItemImageFront->image) : asset('admin_assets/no-image.jpg') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td class="cart-table__column cart-table__column--product">
                                    <a href="" class="cart-table__product-name">{{$items->name}}</a>
                                    <ul class="cart-table__options">
                                        <li>{{Str::limit($items->description, 10, ' ...') }}</li>
                                    </ul>
                                </td>
                                <td class="cart-table__column cart-table__column--price" data-title="Price">
                                    @if(Auth::check())
                                    ${{ number_format($items->unit_price + ($items->unit_price * $cat->organization->commission_rate / 100),2)}}

                                     {{-- ${{ number_format($subcomissionrate,2) }} --}}
                                    @else
                                    ${{number_format($items->unit_price,2)}}
                                    @endif

                                </td>
                                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                    <div class="cart-table__quantity input-number">
                                        <input class="form-control input-number__input" type="number" min="1" cart-id="{{ $items->id }}" value="{{ $value['quantity'] }}" readonly>
                                        <div class="input-number__add" id="number_add"></div>
                                        <div class="input-number__sub" id="number_sub"></div>
                                    </div>
                                </td>
                                <td class="cart-table__column cart-table__column--total" data-title="Total">
                                    @if(Auth::check())

                                    ${{ number_format($items->unit_price + ($items->unit_price * $cat->organization->commission_rate / 100) * $value['quantity'], 2)}}
                                    @else
                                    ${{ number_format($items->unit_price * $value['quantity'],2)}}
                                    @endif
                                </td>
                                <td class="cart-table__column cart-table__column--remove">
                                    <button type="button" class="cart-table__remove btn btn-sm btn-icon btn-muted">
                                        <svg width="12" height="12">
                                            <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
                                                c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
                                                C11.2,9.8,11.2,10.4,10.8,10.8z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot class="cart-table__foot">
                            <tr>
                                <td colspan="6">
                                    <div class="cart-table__actions">
                                        {{-- <form class="cart-table__coupon-form form-row">
                                            <div class="form-group mb-0 col flex-grow-1">
                                                <input type="text" class="form-control form-control-sm" placeholder="Coupon Code">
                                            </div>
                                            <div class="form-group mb-0 col-auto">
                                                <button type="button" class="btn btn-sm btn-primary">Apply Coupon</button>
                                            </div>
                                        </form> --}}
                                        {{-- <div class="cart-table__update-button">
                                            <a class="btn btn-sm btn-primary" href="">Update Cart</a>
                                        </div> --}}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="cart__totals">
                    <div class="card">
                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title">Cart Totals</h3>
                            <table class="cart__totals-table">
                                <thead>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>
                                            @if(Auth::check())
                                            ${{ number_format($subcomissionrate,2) }}
                                            @else
                                            ${{ number_format($subtotal,2)}}
                                            @endif
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>
                                           ${{number_format($shipping,2)}}
                                            {{-- <div>
                                                <a href="">Calculate shipping</a>
                                            </div> --}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tax</th>
                                        <td> ${{number_format($tax,2)}}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <td>
                                            @if(Auth::check())
                                            ${{ number_format($subcomissionrate+ $shipping + $tax,2) }}
                                            @else
                                            ${{ number_format($subtotal + $shipping + $tax,2) }}
                                            @endif
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <a class="btn btn-primary btn-xl btn-block" href="{{route('checkout')}}">
                                Proceed to checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>

<script>
$(document).ready(function() {
    $('.input-number__add').click(function() {
        var input = $(this).parent().find('.input-number__input');
        var cartId = input.attr('cart-id');
        var quantity = parseInt(input.val());
        input.val(quantity);
        $.ajax({
            type: 'POST',
            url: '{{ route('update-cart')}}',
            data: {
                cart_id: cartId,
                quantity: quantity
            },
          success: function(response) {
                toastr.success('Quantity updated successfully');
                setTimeout(function() {
                    location.reload();
                }, 2000); // Adjust the delay as needed
            },
            error: function(xhr, status, error) {
                toastr.error('An error occurred while updating quantity');
            }
        });
    });

    $('.input-number__sub').click(function() {
        var input = $(this).parent().find('.input-number__input');
        var cartId = input.attr('cart-id');
        var quantity = parseInt(input.val());
        if (quantity > 1) {
            quantity--;
            input.val(quantity);
            $.ajax({
                type: 'POST',
                url: '{{ route('update-cart')}}',
                data: {
                    cart_id: cartId,
                    quantity: quantity
                },
                success: function(response) {

                },
                error: function(xhr, status, error) {

                }
            });
        }
    });
});
</script>

@endsection
