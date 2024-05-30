@php
    use App\Models\Item;
    use App\Models\Category;
    use Illuminate\Support\Facades\Auth;
    if (Auth::check()) {
    $categories = getAuthCat();
            }
    $getcategories = Category::with('getParentCategory')->get();
    $partNumbers = Item::limit(5)->pluck('part_no');
    $cartItems = session('cart', []);
    // dd($cartItems);
    $uniqueProductCount = count($cartItems);
@endphp
<!-- site__mobile-header -->
<header class="site__mobile-header">
    <div class="mobile-header">
        <div class="container">
            <div class="mobile-header__body">
                <button class="mobile-header__menu-button" type="button">
                    <svg width="18px" height="14px">
                        <path
                            d="M-0,8L-0,6L18,6L18,8L-0,8ZM-0,-0L18,-0L18,2L-0,2L-0,-0ZM14,14L-0,14L-0,12L14,12L14,14Z" />
                    </svg>
                </button>
                <a class="mobile-header__logo" href="">
                    <!-- mobile-logo -->
                    <img class="logo__part-secondary" src="{{ asset('website/images/logo/AMSLogo.png') }}"
                        width="168">
                    <!-- mobile-logo / end -->
                </a>
                <div class="mobile-header__search mobile-search">
                    <form class="mobile-search__body">
                        <input type="text" class="mobile-search__input" placeholder="Enter keyword or part number">
                        <button type="button" class="mobile-search__vehicle-picker" aria-label="Select Vehicle">
                            <svg width="20" height="20">
                                <path d="M6.6,2c2,0,4.8,0,6.8,0c1,0,2.9,0.8,3.6,2.2C17.7,5.7,17.9,7,18.4,7C20,7,20,8,20,8v1h-1v7.5c0,0.8-0.7,1.5-1.5,1.5h-1
                                                                c-0.8,0-1.5-0.7-1.5-1.5V16H5v0.5C5,17.3,4.3,18,3.5,18h-1C1.7,18,1,17.3,1,16.5V16V9H0V8c0,0,0.1-1,1.6-1C2.1,7,2.3,5.7,3,4.2
                                                                C3.7,2.8,5.6,2,6.6,2z M13.3,4H6.7c-0.8,0-1.4,0-2,0.7c-0.5,0.6-0.8,1.5-1,2C3.6,7.1,3.5,7.9,3.7,8C4.5,8.4,6.1,9,10,9
                                                                c4,0,5.4-0.6,6.3-1c0.2-0.1,0.2-0.8,0-1.2c-0.2-0.4-0.5-1.5-1-2C14.7,4,14.1,4,13.3,4z M4,10c-0.4-0.3-1.5-0.5-2,0
                                                                c-0.4,0.4-0.4,1.6,0,2c0.5,0.5,4,0.4,4,0C6,11.2,4.5,10.3,4,10z M14,12c0,0.4,3.5,0.5,4,0c0.4-0.4,0.4-1.6,0-2c-0.5-0.5-1.3-0.3-2,0
                                                                C15.5,10.2,14,11.3,14,12z" />
                            </svg>
                            <span class="mobile-search__vehicle-picker-label">Vehicle</span>
                        </button>
                        <button type="submit" class="mobile-search__button mobile-search__button--search">
                            <svg width="20" height="20">
                                <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
                                                                c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
                                                                c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z" />
                            </svg>
                        </button>
                        <button type="button" class="mobile-search__button mobile-search__button--close">
                            <svg width="20" height="20">
                                <path d="M16.7,16.7L16.7,16.7c-0.4,0.4-1,0.4-1.4,0L10,11.4l-5.3,5.3c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L8.6,10L3.3,4.7
                                        c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L10,8.6l5.3-5.3c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L11.4,10l5.3,5.3
                                        C17.1,15.7,17.1,16.3,16.7,16.7z" />
                            </svg>
                        </button>
                        <div class="mobile-search__field"></div>
                    </form>
                </div>
                <div class="mobile-header__indicators">
                    <div class="mobile-indicator mobile-indicator--search d-md-none">
                        <button type="button" class="mobile-indicator__button">
                            <span class="mobile-indicator__icon"><svg width="20" height="20">
                                    <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
                                                            c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
                                                            c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z" />
                                </svg>
                            </span>
                        </button>
                    </div>
                    <div class="mobile-indicator d-none d-md-block">
                        <a href="account-login.html" class="mobile-indicator__button">
                            <span class="mobile-indicator__icon"><svg width="20" height="20">
                                    <path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6
                                        c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z" />
                                </svg>
                            </span>
                        </a>
                    </div>
                    <div class="mobile-indicator d-none d-md-block">
                        <a href="wishlist.html" class="mobile-indicator__button">
                            <span class="mobile-indicator__icon">
                                <svg width="20" height="20">
                                    <path d="M14,3c2.2,0,4,1.8,4,4c0,4-5.2,10-8,10S2,11,2,7c0-2.2,1.8-4,4-4c1,0,1.9,0.4,2.7,1L10,5.2L11.3,4C12.1,3.4,13,3,14,3 M14,1
                                                        c-1.5,0-2.9,0.6-4,1.5C8.9,1.6,7.5,1,6,1C2.7,1,0,3.7,0,7c0,5,6,12,10,12s10-7,10-12C20,3.7,17.3,1,14,1L14,1z" />
                                </svg>
                            </span>
                        </a>
                    </div>
                    <div class="mobile-indicator">
                        <a href="{{ route('home') }}" class="mobile-indicator__button">
                            <span class="mobile-indicator__icon">
                                <svg width="20" height="20">
                                    <circle cx="7" cy="17" r="2" />
                                    <circle cx="15" cy="17" r="2" />
                                    <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                                            V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                                            C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                                </svg>
                                <span class="mobile-indicator__counter">3</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- site__mobile-header / end -->

<!-- site__header -->
<header class="site__header">
    <div class="header">
        <div class="header__megamenu-area megamenu-area"></div>
        <div class="header__topbar-classic-bg"></div>
        <div class="header__topbar-classic">
        </div>
        <div class="header__navbar">
            <div class="header__navbar-departments">
                <div class="departments">
                    <div class="departments__menu">
                        <div class="departments__arrow"></div>
                        <div class="departments__body">
                            {{-- <ul class="departments__list">
                                <li class="departments__list-padding" role="presentation"></li>
                                <li
                                    class="departments__item departments__item--submenu--megamenu departments__item--has-submenu">
                                    <a href="" class="departments__item-link">
                                        Headlights & Lighting
                                        <span class="departments__item-arrow"><svg width="7" height="11">

                                            </svg>
                                        </span>
                                    </a>
                                    <div class="departments__item-menu">
                                        <div class="megamenu departments__megamenu departments__megamenu--size--xl">
                                            <div class="megamenu__image">
                                                <img src="" alt="">
                                            </div>
                                            <div class="row">
                                                <div class="col-1of5">
                                                    <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link" href="">Body
                                                                Parts</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Bumpers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Hoods</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Grilles</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Fog Lights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Door Handles</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Car Covers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Tailgates</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Suspension</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Steering</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link" href="">Fuel
                                                                Systems</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Transmission</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link" href="">Air
                                                                Filters</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-1of5">
                                                    <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Headlights & Lighting</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Headlights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Tail Lights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Fog Lights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Turn Signals</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Switches & Relays</a>
                                                                </li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Corner Lights</a></li>
                                                            </ul>
                                                        </li>
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link" href="">Brakes
                                                                & Suspension</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Brake Discs</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Wheel Hubs</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Air Suspension</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Ball Joints</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Brake Pad Sets</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-1of5">
                                                    <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Interior Parts</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Floor Mats</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Gauges</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Consoles &
                                                                        Organizers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Mobile Electronics</a>
                                                                </li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Steering Wheels</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Cargo Accessories</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link" href="">Engine
                                                                & Drivetrain</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Air Filters</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Oxygen Sensors</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Heating</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Exhaust</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Cranks & Pistons</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-1of5">
                                                    <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link" href="">Tools
                                                                & Garage</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Repair Manuals</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Car Care</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Code Readers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Tool Boxes</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="departments__item departments__item--submenu--megamenu departments__item--has-submenu">
                                    <a href="" class="departments__item-link">
                                        Interior Parts
                                        <span class="departments__item-arrow"><svg width="7" height="11">
                                                <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                                C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="departments__item-menu">
                                        <div class="megamenu departments__megamenu departments__megamenu--size--lg">
                                            <div class="megamenu__image">
                                                <img src="/" alt="">
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link" href="">Body
                                                                Parts</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Bumpers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Hoods</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Grilles</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Fog Lights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Door Handles</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Car Covers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Tailgates</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Suspension</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Steering</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link" href="">Fuel
                                                                Systems</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Transmission</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link" href="">Air
                                                                Filters</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-3">
                                                    <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Headlights & Lighting</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Headlights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Tail Lights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Fog Lights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Turn Signals</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Switches & Relays</a>
                                                                </li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Corner Lights</a></li>
                                                            </ul>
                                                        </li>
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link" href="">Brakes
                                                                & Suspension</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Brake Discs</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Wheel Hubs</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Air Suspension</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Ball Joints</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Brake Pad Sets</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-3">
                                                    <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Interior Parts</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Floor Mats</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Gauges</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Consoles &
                                                                        Organizers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Mobile Electronics</a>
                                                                </li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Steering Wheels</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Cargo Accessories</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-3">
                                                    <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link" href="">Tools
                                                                & Garage</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Repair Manuals</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Car Care</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Code Readers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Tool Boxes</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="departments__item departments__item--submenu--megamenu departments__item--has-submenu">
                                    <a href="" class="departments__item-link">
                                        Switches & Relays
                                        <span class="departments__item-arrow"><svg width="7" height="11">
                                                <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                                             C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="departments__item-menu">
                                        <div class="megamenu departments__megamenu departments__megamenu--size--md">
                                            <div class="megamenu__image">
                                                <img src="/" alt="">
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link" href="">Body
                                                                Parts</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Bumpers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Hoods</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Grilles</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Fog Lights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Door Handles</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Car Covers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Tailgates</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Suspension</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Steering</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link" href="">Fuel
                                                                Systems</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Transmission</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link" href="">Air
                                                                Filters</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-4">
                                                    <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Headlights & Lighting</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Headlights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Tail Lights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Fog Lights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Turn Signals</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Switches & Relays</a>
                                                                </li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Corner Lights</a></li>
                                                            </ul>
                                                        </li>
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link" href="">Brakes
                                                                & Suspension</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Brake Discs</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Wheel Hubs</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Air Suspension</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Ball Joints</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Brake Pad Sets</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-4">
                                                    <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Interior Parts</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Floor Mats</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Gauges</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Consoles &
                                                                        Organizers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Mobile Electronics</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="departments__item departments__item--submenu--megamenu departments__item--has-submenu">
                                    <a href="" class="departments__item-link">
                                        Tires & Wheels
                                        <span class="departments__item-arrow"><svg width="7" height="11">
                                                <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                                     C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="departments__item-menu">
                                        <div class="megamenu departments__megamenu departments__megamenu--size--nl">
                                            <div class="megamenu__image">
                                                <img src="/" alt="">
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link" href="">Body
                                                                Parts</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Bumpers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Hoods</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Grilles</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Fog Lights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Door Handles</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Car Covers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Tailgates</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Suspension</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Steering</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link" href="">Fuel
                                                                Systems</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Transmission</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link" href="">Air
                                                                Filters</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Headlights & Lighting</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Headlights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Tail Lights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Fog Lights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Turn Signals</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="departments__item departments__item--submenu--megamenu departments__item--has-submenu">
                                    <a href="" class="departments__item-link">
                                        Tools & Garage
                                        <span class="departments__item-arrow"><svg width="7" height="11">
                                                <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                                             C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="departments__item-menu">
                                        <div class="megamenu departments__megamenu departments__megamenu--size--sm">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                        <li
                                                            class="megamenu-links__item megamenu-links__item--has-submenu">
                                                            <a class="megamenu-links__item-link" href="">Body
                                                                Parts</a>
                                                            <ul class="megamenu-links">
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Bumpers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Hoods</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Grilles</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Fog Lights</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Door Handles</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Car Covers</a></li>
                                                                <li class="megamenu-links__item"><a
                                                                        class="megamenu-links__item-link"
                                                                        href="">Tailgates</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Suspension</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Steering</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link" href="">Fuel
                                                                Systems</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link"
                                                                href="">Transmission</a>
                                                        </li>
                                                        <li class="megamenu-links__item">
                                                            <a class="megamenu-links__item-link" href="">Air
                                                                Filters</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="departments__item">
                                    <a href="" class="departments__item-link">
                                        Clutches
                                    </a>
                                </li>
                                <li class="departments__item">
                                    <a href="" class="departments__item-link">
                                        Fuel Systems
                                    </a>
                                </li>
                                <li class="departments__item">
                                    <a href="" class="departments__item-link">
                                        Steering
                                    </a>
                                </li>
                                <li class="departments__item">
                                    <a href="" class="departments__item-link">
                                        Suspension
                                    </a>
                                </li>
                                <li class="departments__item">
                                    <a href="" class="departments__item-link">
                                        Body Parts
                                    </a>
                                </li>
                                <li class="departments__item">
                                    <a href="" class="departments__item-link">
                                        Transmission
                                    </a>
                                </li>
                                <li class="departments__item">
                                    <a href="" class="departments__item-link">
                                        Air Filters
                                    </a>
                                </li>
                                <li class="departments__list-padding" role="presentation"></li>
                            </ul> --}}
                            <div class="departments__menu-container"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header__navbar-menu">
                <div class="main-menu">
                    <ul class="main-menu__list">
                        <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                            <a href="#" class="main-menu__link">
                                PRODUCT CATEGORIES
                                <svg width="7px" height="5px">
                                    <path
                                        d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z" />
                                </svg>
                            </a>
                            <div class="main-menu__submenu">
                                <ul class="menu">
                                    @if(Auth::check())
                                    @foreach ($categories as $cat)
                                    <li class="menu__item menu__item--has-submenu">
                                        <a href="#" class="menu__link">
                                            {{ $cat->name }}
                                            <span class="menu__arrow">
                                                <svg width="6px" height="9px">
                                                    <path
                                                        d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z" />
                                                </svg>
                                            </span>
                                        </a>
                                        @if ($cat->subcategories->isNotEmpty())
                                            <div class="menu__submenu">
                                                <ul class="menu">
                                                    @foreach ($cat->subcategories as $key => $parentcat)
                                                        <li class="menu__item">
                                                            <a href="{{ route('product-shop', $parentcat->slug) }}"
                                                                class="menu__link">
                                                                {{ $parentcat->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @else
                                            <div class="menu__submenu">

                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                                    @else
                                    @foreach ($getcategories as $key => $cat)
                                        <li class="menu__item menu__item--has-submenu">
                                            <a href="#" class="menu__link">
                                                {{ $cat->name }}
                                                <span class="menu__arrow">
                                                    <svg width="6px" height="9px">
                                                        <path
                                                            d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z" />
                                                    </svg>
                                                </span>
                                            </a>
                                            @if ($cat->getParentCategory->isNotEmpty())
                                                <div class="menu__submenu">
                                                    <ul class="menu">
                                                        @foreach ($cat->getParentCategory as $key => $parentcat)
                                                            <li class="menu__item">
                                                                <a href="{{ route('product-shop', $parentcat->slug) }}"
                                                                    class="menu__link">
                                                                    {{ $parentcat->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @else
                                                <div class="menu__submenu">

                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @if (!Auth::check() || (Auth::check() && Auth::user()->role_id == 0))
                        @else
                            <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                                <a href="{{ route('user-dashboard') }}" class="main-menu__link">
                                    DASHBOARD
                                </a>
                            </li>
                        @endif


                    </ul>
                </div>
            </div>
            <div class="header__navbar-phone phone">
                <a href="" class="phone__body">
                    <div class="phone__title">Call Us:</div>
                    <div class="phone__number">800 060-0730</div>
                </a>
            </div>
        </div>
        <div class="header__logo">
            <a href="{{ route('home') }}" class="logo">
                <div class="logo__slogan">
                    Auto parts for Cars, trucks and motorcycles
                </div>
                <div class="logo__image">
                    <!-- logo -->
                    <img class="logo__part-secondary" src="{{ asset('website/images/logo/AMSLogo.png') }}"
                        width="168">
                    <!-- logo / end -->
                </div>
            </a>
        </div>
        <div class="header__search">
            <div class="search">
                <form action="{{ route('search.items') }}" method="GET" enctype="multipart/form-data" class="search__body m-0">
                    <div class="search__shadow"></div>
                    <input class="search__input" type="text" placeholder="Enter Keyword or Part Number" name="part_no_name">
                    <button class="search__button search__button--start" type="button">
                        <span class="search__button-icon">
                        </span>
                        <span class="search__button-title">Select Parts</span>
                    </button>
                    <button class="search__button search__button--end" type="submit" id="searchButton">
                        <span class="search__button-icon"><svg width="20" height="20">
                                <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
                                                        c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
                                                        c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z" />
                            </svg>
                        </span>
                    </button>
                    <div class="search__box"></div>
                    <div class="search__decor">
                        <div class="search__decor-start"></div>
                        <div class="search__decor-end"></div>
                    </div>

                    <div class="search__dropdown search__dropdown--vehicle-picker vehicle-picker">
                        <div class="search__dropdown-arrow"></div>
                        <div class="vehicle-picker__panel vehicle-picker__panel--list vehicle-picker__panel--active"
                            data-panel="list">
                            <div class="vehicle-picker__panel-body">
                                <div class="vehicle-picker__text">
                                    Select a vehicle to find exact fit parts
                                </div>
                                <div class="vehicles-list">
                                    <div class="vehicles-list__body">
                                        @foreach($partNumbers as $partNumber)
                                        <label class="vehicles-list__item">
                                            <span class="vehicles-list__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="part_no"
                                                        type="radio" value="{{ $partNumber }}">
                                                    <span class="input-radio__circle"></span>
                                                </span>
                                            </span>
                                            <span class="vehicles-list__item-info">
                                                <span class="vehicles-list__item-name">
                                                    {{ $partNumber }}
                                                </span>

                                                </span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- <div class="vehicle-picker__actions">
                                    <button type="button" class="btn btn-primary btn-sm" data-to-panel="form">Add A
                                        Vehicle</button>
                                </div> --}}
                            </div>
                        </div>
                        {{-- <div class="vehicle-picker__panel vehicle-picker__panel--form" data-panel="form">
                            <div class="vehicle-picker__panel-body">
                                <div class="vehicle-form vehicle-form--layout--search">
                                    <div class="vehicle-form__item vehicle-form__item--select">
                                        <select class="form-control form-control-select2" aria-label="Year">
                                            <option value="none">Select Year</option>
                                            <option>2010</option>
                                            <option>2011</option>
                                            <option>2012</option>
                                            <option>2013</option>
                                            <option>2014</option>
                                            <option>2015</option>
                                            <option>2016</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                        </select>
                                    </div>
                                    <div class="vehicle-form__item vehicle-form__item--select">
                                        <select class="form-control form-control-select2" aria-label="Brand" disabled>
                                            <option value="none">Select Brand</option>
                                            <option>Audi</option>
                                            <option>BMW</option>
                                            <option>Ferrari</option>
                                            <option>Ford</option>
                                            <option>KIA</option>
                                            <option>Nissan</option>
                                            <option>Tesla</option>
                                            <option>Toyota</option>
                                        </select>
                                    </div>
                                    <div class="vehicle-form__item vehicle-form__item--select">
                                        <select class="form-control form-control-select2" aria-label="Model" disabled>
                                            <option value="none">Select Model</option>
                                            <option>Explorer</option>
                                            <option>Focus S</option>
                                            <option>Fusion SE</option>
                                            <option>Mustang</option>
                                        </select>
                                    </div>
                                    <div class="vehicle-form__item vehicle-form__item--select">
                                        <select class="form-control form-control-select2" aria-label="Engine"
                                            disabled>
                                            <option value="none">Select Engine</option>
                                            <option>Gas 1.6L 125 hp AT/L4</option>
                                            <option>Diesel 2.5L 200 hp AT/L5</option>
                                            <option>Diesel 3.0L 250 hp MT/L5</option>
                                        </select>
                                    </div>
                                    <div class="vehicle-form__divider">Or</div>
                                    <div class="vehicle-form__item">
                                        <input type="text" class="form-control" placeholder="Enter VIN number"
                                            aria-label="VIN number">
                                    </div>
                                </div>
                                <div class="vehicle-picker__actions">
                                    <div class="search__car-selector-link">
                                        <a href="" data-to-panel="list">Back to vehicles list</a>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm" disabled>Add A
                                        Vehicle</button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
        <div class="header__indicators">

            <div class="indicator indicator--trigger--click">
                <a href="" class="indicator__button">
                    <span class="indicator__icon">
                        <svg width="32" height="32">
                            <circle cx="10.5" cy="27.5" r="2.5" />
                            <circle cx="23.5" cy="27.5" r="2.5" />
                            <path
                                d="M26.4,21H11.2C10,21,9,20.2,8.8,19.1L5.4,4.8C5.3,4.3,4.9,4,4.4,4H1C0.4,4,0,3.6,0,3s0.4-1,1-1h3.4C5.8,2,7,3,7.3,4.3
                                        l3.4,14.3c0.1,0.2,0.3,0.4,0.5,0.4h15.2c0.2,0,0.4-0.1,0.5-0.4l3.1-10c0.1-0.2,0-0.4-0.1-0.4C29.8,8.1,29.7,8,29.5,8H14
                                        c-0.6,0-1-0.4-1-1s0.4-1,1-1h15.5c0.8,0,1.5,0.4,2,1c0.5,0.6,0.6,1.5,0.4,2.2l-3.1,10C28.5,20.3,27.5,21,26.4,21z" />
                        </svg>

                        <span class="indicator__counter" id="cart-count-badge">{{ $uniqueProductCount }}</span>
                    </span>
                </a>
                <div class="indicator__content">
                    <div class="dropcart">
                        <ul class="dropcart__list">
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
                                    <li class="dropcart__item">
                                        <div class="dropcart__item-image image image--type--product">
                                            <a class="image__body" href="#">
                                                <img class="image__tag"
                                                    src="
                                                    {{ optional($items->ItemImageFront)->image ? asset($items->ItemImageFront->image) : asset('admin_assets/no-image.jpg') }}
                                                    "
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="dropcart__item-info">
                                            <div class="dropcart__item-name">
                                                <a href="#">{{ $items->name }}</a>
                                            </div>
                                            <ul class="dropcart__item-features">
                                                <li>{{Str::limit($items->description, 10, ' ...') }}</li>
                                            </ul>

                                            @if(Auth::check())
                                            <div class="dropcart__item-meta">
                                                <div class="dropcart__item-quantity">{{ $value['quantity'] }}</div>
                                                <div class="dropcart__item-price">
                                                    {{ number_format($items->unit_price + ($items->unit_price * $cat->organization->commission_rate / 100),2)}}
                                                </div>
                                            </div>
                                            @else
                                            <div class="dropcart__item-meta">
                                                <div class="dropcart__item-quantity">{{ $value['quantity'] }}</div>
                                                <div class="dropcart__item-price">
                                                    {{ number_format($items->unit_price) }}
                                                </div>
                                            </div>
                                            @endif

                                        </div>
                                        <form action="{{route('cart.remove')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="itemid"
                                            value="{{ $items->id }}" />
                                        <button type="submit" class="dropcart__item-remove"><svg width="10"
                                                height="10">
                                                <path d="M8.8,8.8L8.8,8.8c-0.4,0.4-1,0.4-1.4,0L5,6.4L2.6,8.8c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L3.6,5L1.2,2.6
                                                            c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L5,3.6l2.4-2.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L6.4,5l2.4,2.4
                                                            C9.2,7.8,9.2,8.4,8.8,8.8z" />
                                            </svg>
                                        </button>
                                        </form>

                                    </li>
                                    <li class="dropcart__divider" role="presentation"></li>
                                    @endforeach
                        </ul>
                        <div class="dropcart__totals">
                            <table>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>
                                        @if(Auth::check())
                                        ${{number_format($subcomissionrate,2)}}
                                        @else
                                        ${{number_format($subtotal,2)}}
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>${{ number_format($shipping,2) }}</td>
                                </tr>
                                <tr>
                                    <th>Tax</th>
                                    <td>${{ number_format($tax,2) }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>
                                        @if(Auth::check())
                                        ${{number_format($subcomissionrate + $shipping + $tax,2) }}
                                        @else
                                        ${{ number_format($subtotal + $shipping + $tax,2) }}
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="dropcart__actions">
                            <a href="{{route('addto-cart')}}" class="btn btn-secondary">View Cart</a>
                            <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="indicator">
                <a href="#" class="indicator__button">
                    <span class="indicator__icon">
                        <svg width="32" height="32">
                            <path d="M23,4c3.9,0,7,3.1,7,7c0,6.3-11.4,15.9-14,16.9C13.4,26.9,2,17.3,2,11c0-3.9,3.1-7,7-7c2.1,0,4.1,1,5.4,2.6l1.6,2l1.6-2
                                        C18.9,5,20.9,4,23,4 M23,2c-2.8,0-5.4,1.3-7,3.4C14.4,3.3,11.8,2,9,2c-5,0-9,4-9,9c0,8,14,19,16,19s16-11,16-19C32,6,28,2,23,2L23,2
                                        z" />
                        </svg>
                    </span>
                </a>
            </div>

            @if (Auth::check() )
                <a href="{{ route('user-dashboard') }}" class="indicator__button">
                    <div class="indicator indicator--trigger--click">
                        <button type="submit" class="btn btn-primary btn-sm">My Account</button>
                    </div>
                </a>
            @endif

            @if (!Auth::check() || (Auth::check() && Auth::user()->role_id == 0))
                <a href="{{ route('login') }}" class="indicator__button">
                    <div class="indicator indicator--trigger--click">
                        <button type="submit" class="btn btn-primary btn-sm">Login</button>
                    </div>
                </a>
            @endif


            @if (Auth::check())
                <a href="{{ route('user-logout') }}" class="indicator__button">
                    <div class="indicator indicator--trigger--click">
                        <button type="submit" class="btn btn-primary btn-sm">Log Out</button>
                    </div>
                </a>
            @endif

            @if (!Auth::check() || (Auth::check() && Auth::user()->role_id == 0))
                <a href="{{ route('register') }}" class="indicator__button">
                    <div class="indicator indicator--trigger--click">
                        <button type="submit" class="btn btn-primary btn-sm">Register</button>
                    </div>
                </a>
            @endif

        </div>
    </div>
</header>
<!-- site / end -->

{{-- mobile menu --}}








<!-- mobile-menu -->
<div class="mobile-menu">
    <div class="mobile-menu__backdrop"></div>
    <div class="mobile-menu__body">
        <button class="mobile-menu__close" type="button"><svg width="12" height="12">
                <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
                                        c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
                                        C11.2,9.8,11.2,10.4,10.8,10.8z" />
            </svg>
        </button>
        <div class="mobile-menu__panel">
            <div class="mobile-menu__panel-header">
                <div class="mobile-menu__panel-title">Menu</div>
            </div>
            <div class="mobile-menu__panel-body">
                <div class="mobile-menu__settings-list">

                </div>
                <div class="mobile-menu__divider"></div>
                <div class="mobile-menu__indicators">
                    {{-- <a class="mobile-menu__indicator" href="wishlist.html">
                        <span class="mobile-menu__indicator-icon">
                            <svg width="20" height="20">
                                <path d="M14,3c2.2,0,4,1.8,4,4c0,4-5.2,10-8,10S2,11,2,7c0-2.2,1.8-4,4-4c1,0,1.9,0.4,2.7,1L10,5.2L11.3,4C12.1,3.4,13,3,14,3 M14,1
                                        c-1.5,0-2.9,0.6-4,1.5C8.9,1.6,7.5,1,6,1C2.7,1,0,3.7,0,7c0,5,6,12,10,12s10-7,10-12C20,3.7,17.3,1,14,1L14,1z" />
                            </svg>
                        </span>
                        <span class="mobile-menu__indicator-title">Wishlist</span>
                    </a> --}}
                    @if (Auth::check() )
                    <a href="{{ route('user-dashboard') }}" class="mobile-menu__indicator">
                        <span class="mobile-menu__indicator-icon">
                            <svg width="20" height="20">
                                <path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6
                            c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z" />
                            </svg>
                        </span>
                        <span class="mobile-menu__indicator-title">My Account</span>
                    </a>
                @endif

                @if (!Auth::check() || (Auth::check() && Auth::user()->role_id == 0))
                    <a href="{{ route('login') }}" class="mobile-menu__indicator">
                        <span class="mobile-menu__indicator-icon">
                            <svg width="20" height="20">
                                <path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6
                            c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z" />
                            </svg>
                        </span>
                        <span class="mobile-menu__indicator-title">Login</span>
                    </a>
                @endif


                @if (Auth::check() )
                    <a href="{{ route('user-logout') }}" class="mobile-menu__indicator">
                        <span class="mobile-menu__indicator-icon">
                            <svg width="20" height="20">
                                <path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6
                            c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z" />
                            </svg>
                        </span>
                        <span class="mobile-menu__indicator-title">Log Out</span>
                    </a>
                @endif

                @if (!Auth::check() || (Auth::check() && Auth::user()->role_id == 0))
                    <a href="{{ route('register') }}" class="mobile-menu__indicator">
                        <span class="mobile-menu__indicator-icon">
                            <svg width="20" height="20">
                                <path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6
                            c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z" />
                            </svg>
                        </span>
                        <span class="mobile-menu__indicator-title">Register</span>
                    </a>
                @endif

                    <a class="mobile-menu__indicator" href="{{route('addto-cart')}}">
                        <span class="mobile-menu__indicator-icon">
                            <svg width="20" height="20">
                                <circle cx="7" cy="17" r="2" />
                                <circle cx="15" cy="17" r="2" />
                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                        V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                        C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                            </svg>
                            <span class="mobile-menu__indicator-counter">{{ $uniqueProductCount }}</span>
                        </span>
                        <span class="mobile-menu__indicator-title">Cart</span>
                    </a>

                </div>
                <div class="mobile-menu__divider"></div>
                <ul class="mobile-menu__links">
                    <li data-mobile-menu-item>
                        <a href="index.html" class="" data-mobile-menu-trigger>
                            PRODUCT CATEGORIES
                            <svg width="7" height="11">
                                <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                                C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                            </svg>
                        </a>
                        <div class="mobile-menu__links-panel" data-mobile-menu-panel>
                            <div class="mobile-menu__panel mobile-menu__panel--hidden">
                                <div class="mobile-menu__panel-header">
                                    <button class="mobile-menu__panel-back" type="button">
                                        <svg width="7" height="11">
                                            <path
                                                d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                                        </svg>
                                    </button>
                                    <div class="mobile-menu__panel-title">PRODUCT CATEGORIES</div>
                                </div>
                                <div class="mobile-menu__panel-body">

                                    <ul class="mobile-menu__links">
                                        @if(Auth::check())
                                        @foreach ($categories as $cat)
                                        <li data-mobile-menu-item>
                                            <a href="#" class="" data-mobile-menu-trigger>
                                                {{ $cat->name }}
                                                <svg width="7" height="11">
                                                    <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                        C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                                </svg>
                                            </a>

                                            <div class="mobile-menu__links-panel" data-mobile-menu-panel>
                                                <div class="mobile-menu__panel mobile-menu__panel--hidden">
                                                    <div class="mobile-menu__panel-header">
                                                        <button class="mobile-menu__panel-back" type="button">
                                                            <svg width="7" height="11">
                                                                <path
                                                                    d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                                                            </svg>
                                                        </button>
                                                        <div class="mobile-menu__panel-title">CATEGORIES</div>
                                                    </div>
                                                    @if ($cat->subcategories->isNotEmpty())
                                                        <div class="mobile-menu__panel-body">
                                                            <ul class="mobile-menu__links">
                                                                @foreach ($cat->subcategories as $key => $parentcat)
                                                                    <li data-mobile-menu-item>
                                                                        <a href="{{ route('product-shop', $parentcat->slug) }}"
                                                                            class="data-mobile-menu-trigger">
                                                                            {{ $parentcat->name }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @else
                                                        <div class="mobile-menu__panel-body">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>

                                        @endforeach
                                        @else
                                        @foreach ($getcategories as $key => $cat)
                                            <li data-mobile-menu-item>
                                                <a href="#" class="" data-mobile-menu-trigger>
                                                    {{ $cat->name }}
                                                    <svg width="7" height="11">
                                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                            C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                                    </svg>
                                                </a>

                                                <div class="mobile-menu__links-panel" data-mobile-menu-panel>
                                                    <div class="mobile-menu__panel mobile-menu__panel--hidden">
                                                        <div class="mobile-menu__panel-header">
                                                            <button class="mobile-menu__panel-back" type="button">
                                                                <svg width="7" height="11">
                                                                    <path
                                                                        d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                                                                </svg>
                                                            </button>
                                                            <div class="mobile-menu__panel-title">CATEGORIES</div>
                                                        </div>
                                                        @if ($cat->getParentCategory->isNotEmpty())
                                                            <div class="mobile-menu__panel-body">
                                                                <ul class="mobile-menu__links">
                                                                    @foreach ($cat->getParentCategory as $key => $parentcat)
                                                                        <li data-mobile-menu-item>
                                                                            <a href="{{ route('product-shop', $parentcat->slug) }}"
                                                                                class="data-mobile-menu-trigger">
                                                                                {{ $parentcat->name }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @else
                                                            <div class="mobile-menu__panel-body">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                            @endif



                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
            </div>
        </div>
    </div>
</div>
<!-- mobile-menu / end -->
{{-- end --}}
<script>
     document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.input-radio__input').forEach(function(radio) {
            radio.addEventListener('change', function() {
                document.getElementById('searchButton').click();
            });
        });
    });
</script>
