<div class="col-12 col-lg-2 d-flex">
    <div class="account-nav flex-grow-1">
        <h4 class="account-nav__title">Navigation</h4>
        <ul class="account-nav__list">
            <li class="account-nav__item  account-nav__item--{{ Route::currentRouteName() == 'user-dashboard' ? 'active' : '' }}
            account-nav__item--{{ Route::currentRouteName() == 'user-profile-edit' ? 'active' : '' }}">
                <a href="{{route('user-dashboard') }}">Dashboard</a>
            </li>

            {{-- <li class="account-nav__item ">
                <a href="{{route('user-garage')}}">Garage</a>
            </li> --}}
            {{-- <li class="account-nav__item ">
                <a href="#">Edit Profile</a>
            </li> --}}
            <li class="account-nav__item account-nav__item--{{ Route::currentRouteName() == 'user-orderlist' ? 'active' : '' }}
            account-nav__item--{{ Route::currentRouteName() == 'user-order-details' ? 'active' : '' }} ">
                <a href="{{route('user-orderlist')}}">View Order</a>
            </li>
            {{-- <li class="account-nav__item ">
                <a href="#">Order Details</a>
            </li> --}}
            {{-- <li class="account-nav__item ">
                <a href="#">Addresses</a>
            </li> --}}
            <li class="account-nav__item account-nav__item--{{ Route::currentRouteName() == 'user-quotes' ? 'active' : '' }}
            account-nav__item--{{ Route::currentRouteName() == 'user-quote-details' ? 'active' : '' }}">
                <a href="{{route('user-quotes')}}">View Quotes</a>
            </li>
            <li class="account-nav__item account-nav__item--{{ Route::currentRouteName() == 'user-order-invoice' ? 'active' : '' }}
            account-nav__item--{{ Route::currentRouteName() == 'user-order-invoice-details' ? 'active' : '' }}
            ">
                <a href="{{route('user-order-invoice')}}">Invoice</a>
            </li>
            <li class="account-nav__item ">
                <a href="{{ route('user-logout') }}">Logout</a>
            </li>
            {{-- <li class="account-nav__divider" role="presentation"></li>
            <li class="account-nav__item ">
                <a href="{{ route('home') }}">Logout</a>
            </li> --}}
        </ul>
    </div>
</div>
