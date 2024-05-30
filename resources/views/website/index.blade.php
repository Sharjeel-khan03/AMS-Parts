@extends('website.layouts.master')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
.accordion .accordion-item {
    border-bottom: 1px solid #e5e5e5;
    outline: none;
}

.accordion .accordion-item button[aria-expanded='true'] {
    border-bottom: 1px solid #e52727;
    outline: none;
}

.accordion button {
    outline: none;
    position: relative;
    display: block;
    text-align: left;
    width: 100%;
    padding: 14px 0;
    color: #000;
    font-size: 17px;
    font-weight: 400;
    border: none;
    background: none;
    outline: none;
}

.accordion button:hover,
.accordion button:focus {
    cursor: pointer;
    color: #e52727;
    outline: none;
}

.accordion button:hover::after,
.accordion button:focus::after {
    cursor: pointer;
    color: #e52727;
    border: 1px solid #e52727;
}

.accordion button .accordion-title {
    padding: 10px 1.5em 10px 0;
}

.accordion button .icon {
    display: inline-block;
    position: absolute;
    top: 18px;
    right: 0;
    width: 22px;
    height: 22px;
    border: 1px solid;
    border-radius: 22px;
}

.accordion button .icon::before {
    display: block;
    position: absolute;
    content: '';
    top: 9px;
    left: 5px;
    width: 10px;
    height: 2px;
    background: currentColor;
}

.accordion button .icon::after {
    display: block;
    position: absolute;
    content: '';
    top: 5px;
    left: 9px;
    width: 2px;
    height: 10px;
    background: currentColor;
}

.accordion button[aria-expanded='true'] {
    color: #e52727;
}

.accordion button[aria-expanded='true'] .icon::after {
    width: 0;
}

.accordion button[aria-expanded='true']+.accordion-content {
    opacity: 1;
    max-height: 9em;
    transition: all 200ms linear;
    will-change: opacity, max-height;
}

.accordion .accordion-content {
    opacity: 0;
    max-height: 0;
    overflow: hidden;
    transition: opacity 200ms linear, max-height 200ms linear;
    will-change: opacity, max-height;
}

.accordion .accordion-content p {
    font-size: 1rem;
    font-weight: 300;
    margin: 10px 0;
}

.faq-img {
    width: 100%;
    height: 500px;

}

.faqs-content h2 {
    color: #e52727;
    font-size: 32px;
    font-weight: 600;
}

.faq-img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.faqs-section {
    background: #ffffff;
    padding-top: 2rem;
}

.accordion {
    margin-top: 1rem;
}
</style>
@section('content')
<!-- site -->
<div class="site">
    <!-- site__body -->
    <div class="site__body">
        <div class="block-finder block">
            <div class="decor block-finder__decor decor--type--bottom">
                <div class="decor__body">
                    <div class="decor__start"></div>
                    <div class="decor__end"></div>
                    <div class="decor__center"></div>
                </div>
            </div>
            <div class="block-finder__image"
                style="background-image: url({{ asset('website/images/banners/banner_1.webp') }});"></div>
            {{-- <div class="block-finder__body container container--max--xl">
                    <div class="block-finder__title">Find Your Parts</div>
                    <div class="block-finder__subtitle">Over hundreds of brands and tens of thousands of parts</div>
                    <form class="block-finder__form">
                        <div class="block-finder__form-control block-finder__form-control--select">
                            <form class="search-container">
                                <input type="text" id="search-bar" placeholder="Enter Keyword or Part Number">
                            </form>

                        </div>
                        <button class="block-finder__form-control block-finder__form-control--button" type="submit">Search</button>

                    </form>
                </div> --}}
            <div class="block-finder__body container container--max--xl">
                <div class="block-finder__title">Find Your Parts</div>
                <div class="block-finder__subtitle">Over hundreds of brands and tens of thousands of parts</div>
                <form class="block-finder__form" action="{{ route('search.items') }}" method="GET"
                    enctype="multipart/form-data">
                    <!-- <div class="block-finder__form-control block-finder__form-control--select">
                        <input type="text" id="search-bar" placeholder="Enter Keyword or Part Number"
                            name="part_no_name">
                    </div>
                    <button class="block-finder__form-control block-finder__form-control--button"
                        type="submit">Search</button> -->
                    <div class="search-input-box">  
                        <input type="text" id="search-bar" placeholder="Enter Keyword or Part Number"
                            name="part_no_name">
                        <button class="block-finder__form-control block-finder__form-control--button"
                            type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        {{-- icon section --}}
        <div class="block-features block block-features--layout--top-strip">
            <div class="container">
                <ul class="block-features__list">
                    <li class="block-features__item">
                        <div class="block-features__item-icon">
                            <img src="{{ asset('website/images/categories/1.png') }}" height="48" viewBox="0 0 48 48"
                                alt="">
                        </div>
                        <div class="block-features__item-info">
                            <div class="block-features__item-title">Brokers</div>
                            <div class="block-features__item-subtitle">For orders from $50</div>
                        </div>
                    </li>
                    <li class="block-features__item">
                        <div class="block-features__item-icon">
                            <img src="{{ asset('website/images/categories/2.png') }}" height="48" viewBox="0 0 48 48"
                                alt="">
                        </div>
                        <div class="block-features__item-info">
                            <div class="block-features__item-title">Data Center</div>
                            <div class="block-features__item-subtitle">For orders from $50</div>
                        </div>
                    </li>
                    <li class="block-features__item">
                        <div class="block-features__item-icon">
                            <img src="{{ asset('website/images/categories/3.png') }}" height="48" viewBox="0 0 48 48"
                                alt="">

                        </div>
                        <div class="block-features__item-info">
                            <div class="block-features__item-title">Resellers</div>
                            <div class="block-features__item-subtitle">For orders from $50</div>
                        </div>
                    </li>
                    <li class="block-features__item">
                        <div class="block-features__item-icon">
                            <img src="{{ asset('website/images/categories/4.png') }}" height="48" viewBox="0 0 48 48"
                                alt="">

                        </div>
                        <div class="block-features__item-info">
                            <div class="block-features__item-title">Corporation</div>
                            <div class="block-features__item-subtitle">For orders from $50</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="block-space block-space--layout--spaceship-ledge-height"></div>
        {{-- end --}}

        {{-- hot selling prodct section --}}
        <div class="container text-center my-5">
            <h2 class="font-weight-light" style="text-align: center;margin-bottom: 21px;">HOT SELLING PRODUCTS</h2>
            <div class="position-btn-slider">
                <div class="cstm-css-slider">
                    <div class="swiper mySwiper cstm-width-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="cstm-card">
                                    <div class="cstm-card-img">
                                        <img src="{{ asset('website/images/hot_selling_product_pic/file.png') }}"
                                            class="card-img-top" alt="...">
                                    </div>
                                    <div class="cstm-card-body">
                                        <h5 class="cstm-card-title">NAND Universal Flash</h5>
                                        <p class="cstm-card-text">$210.99</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cstm-card">
                                    <div class="cstm-card-img">
                                        <img src="{{ asset('website/images/hot_selling_product_pic/file2.png') }}"
                                            class="card-img-top" alt="...">
                                    </div>
                                    <div class="cstm-card-body">
                                        <h5 class="cstm-card-title">DRAM Modules</h5>
                                        <p class="cstm-card-text">$175.99</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cstm-card">
                                    <div class="cstm-card-img">
                                        <img src="{{ asset('website/images/hot_selling_product_pic/file3.png') }}"
                                            class="card-img-top" alt="...">
                                    </div>
                                    <div class="cstm-card-body">
                                        <h5 class="cstm-card-title">Industrial Grade</h5>
                                        <p class="cstm-card-text">$155.99</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cstm-card">
                                    <div class="cstm-card-img">
                                        <img src="{{ asset('website/images/hot_selling_product_pic/ddr5_ecc_dimm_front.png') }}"
                                            class="card-img-top" alt="...">
                                    </div>
                                    <div class="cstm-card-body">
                                        <h5 class="cstm-card-title">Ddr5 Ecc U-dimm Ram</h5>
                                        <p class="cstm-card-text">$110.99</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cstm-card">
                                    <div class="cstm-card-img">
                                        <img src="{{ asset('website/images/hot_selling_product_pic/file4.png') }}"
                                            class="card-img-top" alt="...">
                                    </div>
                                    <div class="cstm-card-body">
                                        <h5 class="cstm-card-title">High Size mSATA SSD,</h5>
                                        <p class="cstm-card-text">$160.99</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="cstm-swiper-button-next">
                    <i class="fas fa-chevron-circle-right"></i>
                </div>
                <div class="cstm-swiper-button-prev">
                    <i class="fas fa-chevron-circle-left"></i>

                </div>
            </div>
            <!-- <div class="container-fluid">
                <div class="row mx-auto my-auto">
                    <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner w-100" role="listbox">
                            <div class="carousel-item active">
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <img src="{{ asset('website/images/hot_selling_product_pic/444.jpg') }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">NAND Universal Flash</h5>
                                            <p class="card-text">$210.99</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <img src="{{ asset('website/images/hot_selling_product_pic/333.jpg') }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">DRAM Modules</h5>
                                            <p class="card-text">$175.99</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <img src="{{ asset('website/images/hot_selling_product_pic/555.jpg') }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Industrial Grade</h5>
                                            <p class="card-text">$155.99</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <img src="{{ asset('website/images/hot_selling_product_pic/ddr5_ecc_dimm_front.png') }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Ddr5 Ecc U-dimm Ram</h5>
                                            <p class="card-text">$110.99</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <img src="{{ asset('website/images/hot_selling_product_pic/KingSpec-High-Size-mSATA-SSD.webp') }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">High Size mSATA SSD,</h5>
                                            <p class="card-text">$160.99</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <img src="{{ asset('website/images/hot_selling_product_pic/444.jpg') }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Product Name 1</h5>
                                            <p class="card-text">$X.XX</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle"
                                aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle"
                                aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div> -->
            {{-- <h5 class="mt-2">Advances one slide at a time</h5> --}}
        </div>
        {{-- end --}}

        {{-- category section --}}
        <div class="block-space block-space--layout--divider-nl"></div>
        <div class="block block-brands block-brands--layout--columns-8-full">
            <h2 class="font-weight-light" style="text-align: center;">PRODUCT CATEGORIES</h2>

            <div class="container">
                <ul class="block-brands__list">
                    @foreach ($getcategories as $key=>$item)
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/1.png') }}" alt="">
                            <span class="block-brands__item-name">{{$item->name}}</span>
                        </a>
                    </li>
                    @endforeach
                    {{-- <li class="block-brands__divider" role="presentation"></li>
                        <li class="block-brands__item">
                            <a href="" class="block-brands__item-link">
                                <img src="{{ asset('website/images/categories/2.png') }}" alt="">
                    <span class="block-brands__item-name">Storage</span>
                    </a>
                    </li>
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/3.png') }}" alt="">
                            <span class="block-brands__item-name">Accessories</span>
                        </a>
                    </li>
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/4.png') }}" alt="">
                            <span class="block-brands__item-name">Refurbished Products</span>
                        </a>
                    </li>
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/1.png') }}" alt="">
                            <span class="block-brands__item-name">Brandix</span>
                        </a>
                    </li>
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/2.png') }}" alt="">
                            <span class="block-brands__item-name">ABS-Brand</span>
                        </a>
                    </li>
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/3.png') }}" alt="">
                            <span class="block-brands__item-name">GreatCircle</span>
                        </a>
                    </li>
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/4.png') }}" alt="">
                            <span class="block-brands__item-name">JustRomb</span>
                        </a>
                    </li>
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/1.png') }}" alt="">
                            <span class="block-brands__item-name">FastWheels</span>
                        </a>
                    </li>
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/2.png') }}" alt="">
                            <span class="block-brands__item-name">Stroyka-X</span>
                        </a>
                    </li>
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/3.png') }}" alt="">
                            <span class="block-brands__item-name">Mission-51</span>
                        </a>
                    </li>
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/4.png') }}" alt="">
                            <span class="block-brands__item-name">FuelCorp</span>
                        </a>
                    </li>
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/1.png') }}" alt="">
                            <span class="block-brands__item-name">RedGate</span>
                        </a>
                    </li>
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/2.png') }}" alt="">
                            <span class="block-brands__item-name">Blocks</span>
                        </a>
                    </li>
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/3.png') }}" alt="">
                            <span class="block-brands__item-name">BlackBox</span>
                        </a>
                    </li>
                    <li class="block-brands__divider" role="presentation"></li>
                    <li class="block-brands__item">
                        <a href="" class="block-brands__item-link">
                            <img src="{{ asset('website/images/categories/4.png') }}" alt="">
                            <span class="block-brands__item-name">SquareGarage</span>
                        </a>
                    </li> --}}
                    {{-- <li class="block-brands__divider" role="presentation"></li> --}}
                </ul>
            </div>
        </div>

        {{-- category section end --}}


        {{-- about us section  --}}
        <section class="ban_sec">
            <div class="ban_img">
                <img src="{{ asset('website/images/categories/about-2.jpeg') }}" alt="banner" border="0" width="100">
                <div class="container">
                    <div class="ban_text">
                        <strong>
                            <span>Your Electronic Solutions Partner</span><br>
                            Building the Future of Electronics
                        </strong>
                        <p>Explore the limitless possibilities of electronic manufacturing with iRep Technologies. Our
                            forward-thinking approach and advanced solutions redefine industry standards</p>
                        <a href="#">About Us</a>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </section>
        {{-- about section end --}}



        {{-- faq --}}
        <!-- <section class="faq-section">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="block faq_heading_new pb-3">
                        <h2 class="font-weight-light" style="text-align: center;">FREQUENTLY ASKED QUESTION</h2>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="faq" id="accordion">
                        <div class="card">
                            <div class="card-header" id="faqHeading-1">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-1"
                                        data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                        <span class="badge">1</span>What is Lorem Ipsum?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to
                                        make a type specimen book. </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-2">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-2"
                                        data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                        <span class="badge">2</span> Where does it come from?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                        roots in a piece of classical Latin literature from 45 BC, making it over
                                        2000 years old.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-3">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-3"
                                        data-aria-expanded="false" data-aria-controls="faqCollapse-3">
                                        <span class="badge">3</span>Why do we use it?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>It is a long established fact that a reader will be distracted by the
                                        readable content of a page when looking at its layout. The point of using
                                        Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
                                        opposed to using 'Content here, content here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-4">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-4"
                                        data-aria-expanded="false" data-aria-controls="faqCollapse-4">
                                        <span class="badge">4</span> Where can I get some?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-4" class="collapse" aria-labelledby="faqHeading-4"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the
                                        majority have suffered alteration in some form, by injected humour, or
                                        randomised words which don't look even slightly believable.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-5">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-5"
                                        data-aria-expanded="false" data-aria-controls="faqCollapse-5">
                                        <span class="badge">5</span> What is Lorem Ipsum?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-5" class="collapse" aria-labelledby="faqHeading-5"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p> It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the
                                        1960s with the release of Letraset sheets containing</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-6">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-6"
                                        data-aria-expanded="false" data-aria-controls="faqCollapse-6">
                                        <span class="badge">6</span> Where does it come from?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-6" class="collapse" aria-labelledby="faqHeading-6"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                                        for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum
                                        et Malorum" by Cicero are also reproduced in their exact original form,
                                        accompanied by English versions from the 1914 translation by H. Rackham.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-7">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-7"
                                        data-aria-expanded="false" data-aria-controls="faqCollapse-7">
                                        <span class="badge">7</span> Why do we use it?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-7" class="collapse" aria-labelledby="faqHeading-7"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as
                                        their default model text, and a search for 'lorem ipsum' will uncover many
                                        web sites still in their infancy. Various versions have evolved over the
                                        years, sometimes by accident, sometimes on purpose (injected humour and the
                                        like).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <section class="faqs-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="faq-img">
                            <img src="https://miro.medium.com/v2/resize:fit:700/0*T-LF_r8RFuCDeYZy.jpg"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faqs-content">
                            <h2>Frequently Asked Questions</h2>
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button id="accordion-button-1" aria-expanded="false">
                                        <span class="accordion-title">What is Lorem Ipsum?
                                        </span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book.
                                        </p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-2" aria-expanded="false">
                                        <span class="accordion-title">Where does it come from?
                                        </span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>
                                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                            roots in a piece of classical Latin literature from 45 BC, making it over
                                            2000 years old.
                                        </p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-3" aria-expanded="false">
                                        <span class="accordion-title">What is Lorem Ipsum?
                                        </span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo
                                            duis
                                            ut.
                                            Ut tortor pretium viverra suspendisse potenti.
                                        </p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-4" aria-expanded="false">
                                        <span class="accordion-title">Why do we use it?
                                        </span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>
                                            Many desktop publishing packages and web page editors now use Lorem Ipsum as
                                            their default model text, and a search for 'lorem ipsum' will uncover many
                                            web sites still in their infancy. Various versions have evolved over the
                                            years, sometimes by accident, sometimes on purpose (injected humour and the
                                            like).
                                        </p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-5" aria-expanded="false">
                                        <span class="accordion-title">What is Lorem Ipsum?
                                        </span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo
                                            duis
                                            ut.
                                            Ut tortor pretium viverra suspendisse potenti.
                                        </p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button id="accordion-button-6" aria-expanded="false">
                                        <span class="accordion-title">Why do we use it?
                                        </span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="accordion-content">
                                        <p>
                                            Many desktop publishing packages and web page editors now use Lorem Ipsum as
                                            their default model text, and a search for 'lorem ipsum' will uncover many
                                            web sites still in their infancy. Various versions have evolved over the
                                            years, sometimes by accident, sometimes on purpose (injected humour and the
                                            like).
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- </div> --}}
        {{-- </section> --}}
        {{-- <div class="block faq_heading_new mt-5">
                <h1 class="faq__header-title">Frequently Asked Questions</h1>
            </div>
            <div class='faq'>
                <input id='faq-a' type='checkbox'>
                <label for='faq-a'>
                    <p class="faq-heading">Is this Dropbox upgrade safe?</p>
                    <div class='faq-arrow'></div>
                    <p class="faq-text">It is completely safe and totally legal! There will is no record of this process
                        to your shared Dropbox users.</p>
                </label>
                <input id='faq-b' type='checkbox'>
                <label for='faq-b'>
                    <p class="faq-heading">How long does it take to upgrade my Dropbox?</p>
                    <div class='faq-arrow'></div>
                    <p class="faq-text">Upgrading is a slow process and will take around 3-10 days. <strong>In order to
                            control the risk and secure the space you earned, we will gradually process it.</strong>
                        during this time you can still use your account as normal as usual.</p>
                </label>
                <input id='faq-c' type='checkbox'>
                <label for='faq-c'>
                    <p class="faq-heading">What do you need to do the upgrade?</p>
                    <div class='faq-arrow'></div>
                    <p class="faq-text">NO ACCESS TO YOUR PERSONAL ACCOUNT OR INFO IS REQUIRED! All I need from you is
                        your Dropbox referral link.</p>
                </label>
                <input id='faq-d' type='checkbox'>
                <label for='faq-d'>
                    <p class="faq-heading">Where do I find my personal Dropbox referral link?</p>
                    <div class='faq-arrow'></div>
                    <p class="faq-text">Log in to the Dropbox website and get your referral link:
                        www.dropbox.com/referral. Copy the link (example link: <strong>https://db.tt/xYxYzyXy</strong>)
                        and send it via eBay message. </p>
                </label>
                <input id='faq-e' type='checkbox'>
                <label for='faq-e'>
                    <p class="faq-heading">Can I split the purchased space between several accounts?</p>
                    <div class='faq-arrow'></div>
                    <p class="faq-text">Yes, you can! Just send me all the referral links during the checkout process,
                        including a short note, what account should receive which amount of space.</p>
                </label>
            </div> --}}

        <div class="block-space block-space--layout--divider-nl d-xl-block d-none"></div>
        @endsection




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
        $(document).ready(function() {
            $('#recipeCarousel').carousel({
                interval: 10000
            })

            $('.carousel .carousel-item').each(function() {
                var minPerSlide = 3;
                var next = $(this).next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));

                for (var i = 0; i < minPerSlide; i++) {
                    next = next.next();
                    if (!next.length) {
                        next = $(this).siblings(':first');
                    }

                    next.children(':first-child').clone().appendTo($(this));
                }
            });
        });
        </script>