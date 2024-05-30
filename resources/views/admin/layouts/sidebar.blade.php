<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{route('home')}}">
            <img src="{{ asset('admin_assets/vendors/images/AMSLogo.png') }}" alt="" class="dark-logo" />
            <img src="{{ asset('admin_assets/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">

                {{-- dashboard --}}
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle no-arrow {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                        <span class="micon bi  bi-house"></span>
                        <span class="mtext">Dashboard</span>
                    </a>
                </li>

                {{-- Product Management --}}
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle {{ Route::currentRouteName() == 'item.index' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'categories.index' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'categories.create' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'categories.edit' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'sub-categories.index' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'sub-categories.edit' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'sub-categories.create' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'item.create' ? 'active' : '' }}
                    ">
                        <span class="micon bi bi-house"></span>
                        <span class="mtext">Product Management</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('categories.index') }}" class="{{ Route::currentRouteName() == 'categories.index' ? 'active' : '' }}
                            {{ Route::currentRouteName() == 'categories.edit' ? 'active' : '' }}
                            ">Main
                                Categories</a></li>
                        <li><a href="{{ route('sub-categories.index') }}" class="  {{ Route::currentRouteName() == 'sub-categories.index' ? 'active' : '' }}
                                {{ Route::currentRouteName() == 'sub-categories.edit' ? 'active' : '' }}
                                ">Sub
                                Categories</a></li>
                        <li><a href="{{ route('item.index') }}" class="{{ Route::currentRouteName() == 'item.index' ? 'active' : '' }}
                                {{ Route::currentRouteName() == 'item.create' ? 'active' : '' }}
                                ">All
                                Products</a></li>
                    </ul>
                </li>

                {{-- Purchase Management --}}
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle {{ Route::currentRouteName() == 'purchase-order.index' ? 'active' : '' }}">
                        <span class="micon bi bi-people-fill"></span>
                        <span class="mtext">Purchase Management</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('purchase-order.index') }}" class="{{ Route::currentRouteName() == 'purchase-order.index' ? 'active' : '' }}">Purchase
                                Order List</a></li>
                    </ul>
                </li>

                {{-- Inventory Management --}}
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-house"></span>
                        <span class="mtext">Inventory Management</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('inventories.index') }}" class="{{ Route::currentRouteName() == 'inventories.index' ? 'active' : '' }}">
                                Local Inventory
                            </a>
                        </li>
                        <li><a href="javascript:;">Distribution Partners Inventory</a></li>
                        <li><a href="javascript:;">Mfg/Other Inventory</a></li>
                    </ul>
                </li>

                {{-- Orders Management --}}
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle  {{ Route::currentRouteName() == 'quote.index' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'quote.create' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'quote.edit' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'all-orders' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'all-quotes' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'all-invoices' ? 'active' : '' }}

                    ">
                        <span class="micon bi bi-house"></span>
                        <span class="mtext">Orders Management</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('orders.index') }}" class="{{ Route::currentRouteName() == 'orders.index' ? 'active' : '' }}
                            {{ Route::currentRouteName() == 'orders.create' ? 'active' : '' }}
                            {{ Route::currentRouteName() == 'orders.edit' ? 'active' : '' }}
                            {{ Route::currentRouteName() == 'orders.show' ? 'active' : '' }}

                            ">Current Open Orders</a></li>

                        <li><a href="{{ route('quote.index') }}" class="{{ Route::currentRouteName() == 'quote.index' ? 'active' : '' }}
                            {{ Route::currentRouteName() == 'quote.create' ? 'active' : '' }}
                            {{ Route::currentRouteName() == 'quote.edit' ? 'active' : '' }}
                            {{ Route::currentRouteName() == 'quote.show' ? 'active' : '' }}
                            ">Current Open Quotes</a></li>

                        <li><a href="{{ route('all-orders') }}"  class="{{ Route::currentRouteName() == 'all-orders' ? 'active' : '' }}">All Orders</a></li>
                        <li><a href="{{ route('all-quotes') }}" class="{{ Route::currentRouteName() == 'all-quotes' ? 'active' : '' }}">All Quotes</a></li>
                        <li><a href="{{ route('all-invoices') }}" class="{{ Route::currentRouteName() == 'all-invoices' ? 'active' : '' }}
                            {{ Route::currentRouteName() == 'show-invoice' ? 'active' : '' }}

                            ">Invoices</a></li>

                    </ul>
                </li>

                {{-- Reports --}}
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-filesweb"></span>
                        <span class="mtext">Reports</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="javascript:;">All A/R Report</a></li>
                        <li><a href="javascript:;">Overdue Accounts Only</a></li>
                        <li><a href="javascript:;">Sales Report</a></li>
                    </ul>
                </li>



                {{-- Currency --}}

                {{-- user's --}}
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'currency.index' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'user-roles.create' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'warehouse.index' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'warehouse.create' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'vendors.index' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'vendors.create' ? 'active' : '' }}

                    ">
                        <span class="micon bi bi-people-fill"></span>
                        <span class="mtext">Setup Management</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('currency.index') }}" class="{{ Route::currentRouteName() == 'currency.index' ? 'active' : '' }}">Currency</a>
                        </li>
                        <li><a href="{{ route('warehouse.index') }}" class="{{ Route::currentRouteName() == 'warehouse.index' ? 'active' : '' }}
                            {{ Route::currentRouteName() == 'warehouse.create' ? 'active' : '' }}
                            ">Warehouse</a></li>
                        <li><a href="{{ route('vendors.index') }}" class="{{ Route::currentRouteName() == 'vendors.index' ? 'active' : '' }}
                            {{ Route::currentRouteName() == 'vendors.create' ? 'active' : '' }}
                            ">Vendor</a></li>
                        <li><a href="{{ route('organizations.index') }}" class="{{ Route::currentRouteName() == 'organizations.index' ? 'active' : '' }}">Organization</a></li>
                        <li><a href="{{ route('users.index') }}" class="{{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}">Customers</a>
                        </li>
                        {{-- <li><a href="javascript:;">User</a></li> --}}
                        <li><a href="{{ route('user-roles.index') }}" class="{{ Route::currentRouteName() == 'user-roles.index' ? 'active' : '' }}
                            {{ Route::currentRouteName() == 'user-roles.create' ? 'active' : '' }}
                            ">Roles</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
