@extends('website.layouts.master')
{{--  --}}
{{-- @php
 {{ dd($priceWithCommission); }}
@endphp --}}
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    img {
        max-width: 100px;
    }

    #outer {
        width: 100% !important;
        text-align: center !important;
    }

    .inner {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        margin-right: 4px;
        /* display: inline-block !important; */
    }

    .buynow {
        border-radius: 17px;
        position: relative;
        top: 1vh;
        margin-left: 1px;
    }
</style>
@section('content')
    <div class="container">
        <h1 class="block-header__title">Transmission</h1>
    </div>
    </div>
    </div>
    <div class="block-split block-split--has-sidebar">
        <div class="container">
            <div class="block-split__row row no-gutters">
                <div class="block-split__item block-split__item-sidebar col-auto">
                    <div class="sidebar sidebar--offcanvas--mobile">
                        <div class="sidebar__backdrop"></div>
                        <div class="sidebar__body">
                            <div class="sidebar__header">
                                <div class="sidebar__title">Filters</div>
                                <button class="sidebar__close" type="button"><svg width="12" height="12">
                                        <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
                                                                        c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
                                                                        C11.2,9.8,11.2,10.4,10.8,10.8z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="sidebar__content">
                                <div class="widget widget-filters widget-filters--offcanvas--mobile" data-collapse
                                    data-collapse-opened-class="filter--opened">
                                    <div class="widget__header widget-filters__header">
                                        <h4>Filters</h4>
                                    </div>
                                    <div class="widget-filters__list">
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item>
                                                <button type="button" class="filter__title" data-collapse-trigger>
                                                    Categories
                                                    <span class="filter__arrow"><svg width="12px" height="7px">
                                                            <path
                                                                d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                                        </svg></span>
                                                </button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-categories">
                                                            <ul class="filter-categories__list">
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--parent">
                                                                    <span class="filter-categories__arrow"><svg
                                                                            width="6" height="9">
                                                                            <path
                                                                                d="M5.7,8.7L5.7,8.7c-0.4,0.4-0.9,0.4-1.3,0L0,4.5l4.4-4.2c0.4-0.4,0.9-0.3,1.3,0l0,0c0.4,0.4,0.4,1,0,1.3l-3,2.9l3,2.9
                                                                                                                                            C6.1,7.8,6.1,8.4,5.7,8.7z" />
                                                                        </svg>
                                                                    </span>
                                                                    <a href="">Construction & Repair</a>
                                                                    <div class="filter-categories__counter">254</div>
                                                                </li>
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--parent">
                                                                    <span class="filter-categories__arrow"><svg
                                                                            width="6" height="9">
                                                                            <path
                                                                                d="M5.7,8.7L5.7,8.7c-0.4,0.4-0.9,0.4-1.3,0L0,4.5l4.4-4.2c0.4-0.4,0.9-0.3,1.3,0l0,0c0.4,0.4,0.4,1,0,1.3l-3,2.9l3,2.9
                                                                                                            C6.1,7.8,6.1,8.4,5.7,8.7z" />
                                                                        </svg>
                                                                    </span>
                                                                    <a href="">Instruments</a>
                                                                    <div class="filter-categories__counter">75</div>
                                                                </li>
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--current">
                                                                    <a href="">Power Tools</a>
                                                                    <div class="filter-categories__counter">21</div>
                                                                </li>
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--child">
                                                                    <a href="">Drills & Mixers</a>
                                                                    <div class="filter-categories__counter">15</div>
                                                                </li>
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--child">
                                                                    <a href="">Cordless Screwdrivers</a>
                                                                    <div class="filter-categories__counter">2</div>
                                                                </li>
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--child">
                                                                    <a href="">Screwdrivers</a>
                                                                    <div class="filter-categories__counter">30</div>
                                                                </li>
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--child">
                                                                    <a href="">Wrenches</a>
                                                                    <div class="filter-categories__counter">7</div>
                                                                </li>
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--child">
                                                                    <a href="">Grinding Machines</a>
                                                                    <div class="filter-categories__counter">5</div>
                                                                </li>
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--child">
                                                                    <a href="">Milling Cutters</a>
                                                                    <div class="filter-categories__counter">2</div>
                                                                </li>
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--child">
                                                                    <a href="">Electric Spray Guns</a>
                                                                    <div class="filter-categories__counter">9</div>
                                                                </li>
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--child">
                                                                    <a href="">Jigsaws</a>
                                                                    <div class="filter-categories__counter">4</div>
                                                                </li>
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--child">
                                                                    <a href="">Jackhammers</a>
                                                                    <div class="filter-categories__counter">0</div>
                                                                </li>
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--child">
                                                                    <a href="">Planers</a>
                                                                    <div class="filter-categories__counter">12</div>
                                                                </li>
                                                                <li
                                                                    class="filter-categories__item filter-categories__item--child">
                                                                    <a href="">Glue Guns</a>
                                                                    <div class="filter-categories__counter">7</div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item>
                                                <button type="button" class="filter__title" data-collapse-trigger>
                                                    Vehicle
                                                    <span class="filter__arrow"><svg width="12px" height="7px">
                                                            <path
                                                                d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                                        </svg></span>
                                                </button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-vehicle">
                                                            <ul class="filter-vehicle__list">
                                                                <li class="filter-vehicle__item ">
                                                                    <label class="filter-vehicle__item-label">
                                                                        <span class="filter-list__input input-radio">
                                                                            <span class="input-radio__body">
                                                                                <input class="input-radio__input"
                                                                                    name="filter_vehicle" type="radio">
                                                                                <span class="input-radio__circle"></span>
                                                                            </span>
                                                                        </span>
                                                                        <span class="filter-vehicle__item-title">
                                                                            All Parts
                                                                        </span>
                                                                        <span class="filter-vehicle__item-counter">57</span>
                                                                    </label>
                                                                </li>
                                                                <li class="filter-vehicle__item ">
                                                                    <label class="filter-vehicle__item-label">
                                                                        <span class="filter-list__input input-radio">
                                                                            <span class="input-radio__body">
                                                                                <input class="input-radio__input"
                                                                                    name="filter_vehicle" type="radio"
                                                                                    checked>
                                                                                <span class="input-radio__circle"></span>
                                                                            </span>
                                                                        </span>
                                                                        <span class="filter-vehicle__item-title">
                                                                            2011 Ford Focus S
                                                                        </span>
                                                                        <span
                                                                            class="filter-vehicle__item-counter">12</span>
                                                                    </label>
                                                                </li>
                                                                <li class="filter-vehicle__item ">
                                                                    <label class="filter-vehicle__item-label">
                                                                        <span class="filter-list__input input-radio">
                                                                            <span class="input-radio__body">
                                                                                <input class="input-radio__input"
                                                                                    name="filter_vehicle" type="radio">
                                                                                <span class="input-radio__circle"></span>
                                                                            </span>
                                                                        </span>
                                                                        <span class="filter-vehicle__item-title">
                                                                            2015 Audi A3
                                                                        </span>
                                                                        <span
                                                                            class="filter-vehicle__item-counter">51</span>
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                            <div class="filter-vehicle__button">
                                                                <button type="button"
                                                                    class="btn btn-xs btn-secondary">Add Vehicle</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item>
                                                <button type="button" class="filter__title" data-collapse-trigger>
                                                    Price
                                                    <span class="filter__arrow"><svg width="12px" height="7px">
                                                            <path
                                                                d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                                        </svg></span>
                                                </button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-price" data-min="500" data-max="1500"
                                                            data-from="590" data-to="1000">
                                                            <div class="filter-price__slider"></div>
                                                            <div class="filter-price__title-button">
                                                                <div class="filter-price__title">$<span
                                                                        class="filter-price__min-value"></span> – $<span
                                                                        class="filter-price__max-value"></span></div>
                                                                <button type="button"
                                                                    class="btn btn-xs btn-secondary filter-price__button">Filter</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item>
                                                <button type="button" class="filter__title" data-collapse-trigger>
                                                    Brand
                                                    <span class="filter__arrow"><svg width="12px" height="7px">
                                                            <path
                                                                d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                                        </svg></span>
                                                </button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-list">
                                                            <div class="filter-list__list">
                                                                <label class="filter-list__item ">
                                                                    <span class="input-check filter-list__input">
                                                                        <span class="input-check__body">
                                                                            <input class="input-check__input"
                                                                                type="checkbox">
                                                                            <span class="input-check__box"></span>
                                                                            <span class="input-check__icon"><svg
                                                                                    width="9px" height="7px">
                                                                                    <path
                                                                                        d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                                                </svg>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Wakita
                                                                    </span>
                                                                    <span class="filter-list__counter">7</span>
                                                                </label>
                                                                <label class="filter-list__item ">
                                                                    <span class="input-check filter-list__input">
                                                                        <span class="input-check__body">
                                                                            <input class="input-check__input"
                                                                                type="checkbox" checked>
                                                                            <span class="input-check__box"></span>
                                                                            <span class="input-check__icon"><svg
                                                                                    width="9px" height="7px">
                                                                                    <path
                                                                                        d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                                                </svg>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Zosch
                                                                    </span>
                                                                    <span class="filter-list__counter">42</span>
                                                                </label>
                                                                <label
                                                                    class="filter-list__item  filter-list__item--disabled ">
                                                                    <span class="input-check filter-list__input">
                                                                        <span class="input-check__body">
                                                                            <input class="input-check__input"
                                                                                type="checkbox" checked disabled>
                                                                            <span class="input-check__box"></span>
                                                                            <span class="input-check__icon"><svg
                                                                                    width="9px" height="7px">
                                                                                    <path
                                                                                        d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                                                </svg>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        WeVALT
                                                                    </span>
                                                                </label>
                                                                <label
                                                                    class="filter-list__item  filter-list__item--disabled ">
                                                                    <span class="input-check filter-list__input">
                                                                        <span class="input-check__body">
                                                                            <input class="input-check__input"
                                                                                type="checkbox" disabled>
                                                                            <span class="input-check__box"></span>
                                                                            <span class="input-check__icon"><svg
                                                                                    width="9px" height="7px">
                                                                                    <path
                                                                                        d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                                                </svg>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Hammer
                                                                    </span>
                                                                </label>
                                                                <label class="filter-list__item ">
                                                                    <span class="input-check filter-list__input">
                                                                        <span class="input-check__body">
                                                                            <input class="input-check__input"
                                                                                type="checkbox">
                                                                            <span class="input-check__box"></span>
                                                                            <span class="input-check__icon"><svg
                                                                                    width="9px" height="7px">
                                                                                    <path
                                                                                        d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                                                </svg>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Mitasia
                                                                    </span>
                                                                    <span class="filter-list__counter">1</span>
                                                                </label>
                                                                <label class="filter-list__item ">
                                                                    <span class="input-check filter-list__input">
                                                                        <span class="input-check__body">
                                                                            <input class="input-check__input"
                                                                                type="checkbox">
                                                                            <span class="input-check__box"></span>
                                                                            <span class="input-check__icon"><svg
                                                                                    width="9px" height="7px">
                                                                                    <path
                                                                                        d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                                                </svg>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Metaggo
                                                                    </span>
                                                                    <span class="filter-list__counter">25</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item>
                                                <button type="button" class="filter__title" data-collapse-trigger>
                                                    Brand
                                                    <span class="filter__arrow"><svg width="12px" height="7px">
                                                            <path
                                                                d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                                        </svg></span>
                                                </button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-list">
                                                            <div class="filter-list__list">
                                                                <label class="filter-list__item ">
                                                                    <span class="filter-list__input input-radio">
                                                                        <span class="input-radio__body">
                                                                            <input class="input-radio__input"
                                                                                name="filter_radio" type="radio">
                                                                            <span class="input-radio__circle"></span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Wakita
                                                                    </span>
                                                                    <span class="filter-list__counter">7</span>
                                                                </label>
                                                                <label class="filter-list__item ">
                                                                    <span class="filter-list__input input-radio">
                                                                        <span class="input-radio__body">
                                                                            <input class="input-radio__input"
                                                                                name="filter_radio" type="radio">
                                                                            <span class="input-radio__circle"></span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Zosch
                                                                    </span>
                                                                    <span class="filter-list__counter">42</span>
                                                                </label>
                                                                <label
                                                                    class="filter-list__item  filter-list__item--disabled ">
                                                                    <span class="filter-list__input input-radio">
                                                                        <span class="input-radio__body">
                                                                            <input class="input-radio__input"
                                                                                name="filter_radio" type="radio" checked
                                                                                disabled>
                                                                            <span class="input-radio__circle"></span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        WeVALT
                                                                    </span>
                                                                </label>
                                                                <label
                                                                    class="filter-list__item  filter-list__item--disabled ">
                                                                    <span class="filter-list__input input-radio">
                                                                        <span class="input-radio__body">
                                                                            <input class="input-radio__input"
                                                                                name="filter_radio" type="radio"
                                                                                disabled>
                                                                            <span class="input-radio__circle"></span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Hammer
                                                                    </span>
                                                                </label>
                                                                <label class="filter-list__item ">
                                                                    <span class="filter-list__input input-radio">
                                                                        <span class="input-radio__body">
                                                                            <input class="input-radio__input"
                                                                                name="filter_radio" type="radio">
                                                                            <span class="input-radio__circle"></span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Mitasia
                                                                    </span>
                                                                    <span class="filter-list__counter">1</span>
                                                                </label>
                                                                <label class="filter-list__item ">
                                                                    <span class="filter-list__input input-radio">
                                                                        <span class="input-radio__body">
                                                                            <input class="input-radio__input"
                                                                                name="filter_radio" type="radio">
                                                                            <span class="input-radio__circle"></span>
                                                                        </span>
                                                                    </span>
                                                                    <span class="filter-list__title">
                                                                        Metaggo
                                                                    </span>
                                                                    <span class="filter-list__counter">25</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item>
                                                <button type="button" class="filter__title" data-collapse-trigger>
                                                    Rating
                                                    <span class="filter__arrow"><svg width="12px" height="7px">
                                                            <path
                                                                d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                                        </svg></span>
                                                </button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-rating">
                                                            <ul class="filter-rating__list">
                                                                <li class="filter-rating__item">
                                                                    <label class="filter-rating__item-label">
                                                                        <span
                                                                            class="input-check filter-rating__item-input">
                                                                            <span class="input-check__body">
                                                                                <input class="input-check__input"
                                                                                    type="checkbox">
                                                                                <span class="input-check__box"></span>
                                                                                <span class="input-check__icon"><svg
                                                                                        width="9px" height="7px">
                                                                                        <path
                                                                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                                                    </svg>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                        <span class="filter-rating__item-stars">
                                                                            <div class="rating">
                                                                                <div class="rating__body">
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </span>
                                                                        <span class="filter-rating__item-title sr-only">
                                                                            5 stars
                                                                        </span>
                                                                        <span class="filter-rating__item-counter">42</span>
                                                                    </label>
                                                                </li>
                                                                <li class="filter-rating__item">
                                                                    <label class="filter-rating__item-label">
                                                                        <span
                                                                            class="input-check filter-rating__item-input">
                                                                            <span class="input-check__body">
                                                                                <input class="input-check__input"
                                                                                    type="checkbox">
                                                                                <span class="input-check__box"></span>
                                                                                <span class="input-check__icon"><svg
                                                                                        width="9px" height="7px">
                                                                                        <path
                                                                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                                                    </svg>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                        <span class="filter-rating__item-stars">
                                                                            <div class="rating">
                                                                                <div class="rating__body">
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                    <div class="rating__star"></div>
                                                                                </div>
                                                                            </div>
                                                                        </span>
                                                                        <span class="filter-rating__item-title sr-only">
                                                                            4 stars
                                                                        </span>
                                                                        <span class="filter-rating__item-counter">24</span>
                                                                    </label>
                                                                </li>
                                                                <li class="filter-rating__item">
                                                                    <label class="filter-rating__item-label">
                                                                        <span
                                                                            class="input-check filter-rating__item-input">
                                                                            <span class="input-check__body">
                                                                                <input class="input-check__input"
                                                                                    type="checkbox">
                                                                                <span class="input-check__box"></span>
                                                                                <span class="input-check__icon"><svg
                                                                                        width="9px" height="7px">
                                                                                        <path
                                                                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                                                    </svg>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                        <span class="filter-rating__item-stars">
                                                                            <div class="rating">
                                                                                <div class="rating__body">
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                    <div class="rating__star"></div>
                                                                                    <div class="rating__star"></div>
                                                                                </div>
                                                                            </div>
                                                                        </span>
                                                                        <span class="filter-rating__item-title sr-only">
                                                                            3 stars
                                                                        </span>
                                                                        <span class="filter-rating__item-counter">19</span>
                                                                    </label>
                                                                </li>
                                                                <li class="filter-rating__item">
                                                                    <label class="filter-rating__item-label">
                                                                        <span
                                                                            class="input-check filter-rating__item-input">
                                                                            <span class="input-check__body">
                                                                                <input class="input-check__input"
                                                                                    type="checkbox">
                                                                                <span class="input-check__box"></span>
                                                                                <span class="input-check__icon"><svg
                                                                                        width="9px" height="7px">
                                                                                        <path
                                                                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                                                    </svg>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                        <span class="filter-rating__item-stars">
                                                                            <div class="rating">
                                                                                <div class="rating__body">
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                    <div class="rating__star"></div>
                                                                                    <div class="rating__star"></div>
                                                                                    <div class="rating__star"></div>
                                                                                </div>
                                                                            </div>
                                                                        </span>
                                                                        <span class="filter-rating__item-title sr-only">
                                                                            2 stars
                                                                        </span>
                                                                        <span class="filter-rating__item-counter">3</span>
                                                                    </label>
                                                                </li>
                                                                <li class="filter-rating__item">
                                                                    <label class="filter-rating__item-label">
                                                                        <span
                                                                            class="input-check filter-rating__item-input">
                                                                            <span class="input-check__body">
                                                                                <input class="input-check__input"
                                                                                    type="checkbox">
                                                                                <span class="input-check__box"></span>
                                                                                <span class="input-check__icon"><svg
                                                                                        width="9px" height="7px">
                                                                                        <path
                                                                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                                                    </svg>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                        <span class="filter-rating__item-stars">
                                                                            <div class="rating">
                                                                                <div class="rating__body">
                                                                                    <div
                                                                                        class="rating__star rating__star--active">
                                                                                    </div>
                                                                                    <div class="rating__star"></div>
                                                                                    <div class="rating__star"></div>
                                                                                    <div class="rating__star"></div>
                                                                                    <div class="rating__star"></div>
                                                                                </div>
                                                                            </div>
                                                                        </span>
                                                                        <span class="filter-rating__item-title sr-only">
                                                                            1 star
                                                                        </span>
                                                                        <span class="filter-rating__item-counter">12</span>
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="widget-filters__actions d-flex">
                                        <button class="btn btn-primary btn-sm">Filter</button>
                                        <button class="btn btn-secondary btn-sm">Reset</button>
                                    </div>
                                </div>
                                {{-- <div class="card widget widget-products d-none d-lg-block">
                                    <div class="widget__header">
                                        <h4>Latest Products</h4>
                                    </div>
                                    <div class="widget-products__list">
                                        <div class="widget-products__item">
                                            <div class="widget-products__image image image--type--product">
                                                <a href="{{ route('product-detail') }}" class="image__body">
                                                    <img class="image__tag" src="{{asset('website//product-1-64x64.jpg')}}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="widget-products__info">
                                                <div class="widget-products__name">
                                                    <a href="{{ route('product-detail') }}">Brandix Spark Plug Kit ASR-400</a>
                                                </div>
                                                <div class="widget-products__prices">
                                                    <div class="widget-products__price widget-products__price--current">
                                                        $19.00</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-products__item">
                                            <div class="widget-products__image image image--type--product">
                                                <a href="{{ route('product-detail') }}" class="image__body">
                                                    <img class="image__tag" src="{{asset('website//product-1-64x64.jpg')}}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="widget-products__info">
                                                <div class="widget-products__name">
                                                    <a href="{{ route('product-detail') }}">Brandix Brake Kit BDX-750Z370-S</a>
                                                </div>
                                                <div class="widget-products__prices">
                                                    <div class="widget-products__price widget-products__price--current">
                                                        $224.00</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-products__item">
                                            <div class="widget-products__image image image--type--product">
                                                <a href="{{ route('product-detail') }}" class="image__body">
                                                    <img class="image__tag" src="{{asset('website//product-1-64x64.jpg')}}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="widget-products__info">
                                                <div class="widget-products__name">
                                                    <a href="{{ route('product-detail') }}">Left Headlight Of Brandix Z54</a>
                                                </div>
                                                <div class="widget-products__prices">
                                                    <div class="widget-products__price widget-products__price--new">$349.00
                                                    </div>
                                                    <div class="widget-products__price widget-products__price--old">$415.00
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-products__item">
                                            <div class="widget-products__image image image--type--product">
                                                <a href="{{ route('product-detail') }}" class="image__body">
                                                    <img class="image__tag" src="{{asset('website//product-1-64x64.jpg')}}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="widget-products__info">
                                                <div class="widget-products__name">
                                                    <a href="{{ route('product-detail') }}">Glossy Gray 19" Aluminium Wheel AR-19</a>
                                                </div>
                                                <div class="widget-products__prices">
                                                    <div class="widget-products__price widget-products__price--current">
                                                        $589.00</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-products__item">
                                            <div class="widget-products__image image image--type--product">
                                                <a href="{{ route('product-detail') }}" class="image__body">
                                                    <img class="image__tag" src="{{asset('website//product-1-64x64.jpg')}}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="widget-products__info">
                                                <div class="widget-products__name">
                                                    <a href="{{ route('product-detail') }}">Twin Exhaust Pipe From Brandix Z54</a>
                                                </div>
                                                <div class="widget-products__prices">
                                                    <div class="widget-products__price widget-products__price--current">
                                                        $749.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-split__item block-split__item-content col-auto">
                    <div class="block">
                        <div class="products-view">
                            <div class="products-view__options view-options view-options--offcanvas--mobile">
                                <div class="view-options__body">
                                    <button type="button" class="view-options__filters-button filters-button">
                                        <span class="filters-button__icon"><svg width="16" height="16">
                                                <path
                                                    d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2
                                                                                C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2
                                                                                C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3
                                                                                C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z" />
                                            </svg>
                                        </span>
                                        <span class="filters-button__title">Filters</span>
                                        <span class="filters-button__counter">3</span>
                                    </button>
                                    <div class="view-options__layout layout-switcher">
                                        <div class="layout-switcher__list">

                                            <button type="button"
                                                class="layout-switcher__button layout-switcher__button--active"
                                                data-layout="table" data-with-features="false">
                                                <svg width="16" height="16">
                                                    <path
                                                        d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2v-2.4C0,12.4,0.4,12,0.8,12h14.4c0.4,0,0.8,0.4,0.8,0.8v2.4C16,15.6,15.6,16,15.2,16z
                                                                                    M15.2,10H0.8C0.4,10,0,9.6,0,9.2V6.8C0,6.4,0.4,6,0.8,6h14.4C15.6,6,16,6.4,16,6.8v2.4C16,9.6,15.6,10,15.2,10z M15.2,4H0.8
                                                                                    C0.4,4,0,3.6,0,3.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v2.4C16,3.6,15.6,4,15.2,4z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="view-options__legend">
                                        Showing 6 of 98 products
                                    </div>
                                    <div class="view-options__spring"></div>
                                    <div class="view-options__select">
                                        <label for="view-option-sort">Sort:</label>
                                        <select id="view-option-sort" class="form-control form-control-sm"
                                            name="">
                                            <option value="">Price</option>
                                        </select>
                                    </div>
                                    <div class="view-options__select">
                                        <label for="view-option-limit">Show:</label>
                                        <select id="view-option-limit" class="form-control form-control-sm"
                                            name="">
                                            <option value="">16</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- active filter section --}}
                                {{-- <div class="view-options__body view-options__body--filters">
                                    <div class="view-options__label">Active Filters</div>
                                    <div class="applied-filters">
                                        <ul class="applied-filters__list">
                                            <li class="applied-filters__item">
                                                <a href=""
                                                    class="applied-filters__button applied-filters__button--filter">
                                                    Sales: Top Sellers
                                                    <svg width="9" height="9">
                                                        <path
                                                            d="M9,8.5L8.5,9l-4-4l-4,4L0,8.5l4-4l-4-4L0.5,0l4,4l4-4L9,0.5l-4,4L9,8.5z" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="applied-filters__item">
                                                <a href=""
                                                    class="applied-filters__button applied-filters__button--filter">
                                                    Color: True Red
                                                    <svg width="9" height="9">
                                                        <path
                                                            d="M9,8.5L8.5,9l-4-4l-4,4L0,8.5l4-4l-4-4L0.5,0l4,4l4-4L9,0.5l-4,4L9,8.5z" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="applied-filters__item">
                                                <button type="button"
                                                    class="applied-filters__button applied-filters__button--clear">Clear
                                                    All</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div> --}}
                                {{-- end --}}
                            </div>
                            <div class="products-view__list products-list products-list--grid--4" data-layout="table"
                                data-with-features="false">
                                <div class="products-list__head">
                                    <div class="products-list__column products-list__column--image">Image</div>
                                    <div class="products-list__column products-list__column--meta">Part No</div>
                                    <div class="products-list__column products-list__column--product">Product</div>
                                    <div class="products-list__column products-list__column--rating">Stock</div>
                                    <div class="products-list__column products-list__column--price">Price</div>
                                    <div class="products-list__column products-list__column--action"></div>
                                    {{-- <div class="products-list__column products-list__column--action"></div> --}}


                                </div>
                                    @isset($dataproduct)
                                        @if ($dataproduct->count() > 0)
                                            @foreach ($dataproduct as $key => $item)
                                                    @foreach ($item->ItemImage as $image)
                                                        <div class="products-list__content">
                                                            <div class="products-list__item">
                                                                <div class="product-card">
                                                                    <a href="{{ route('product-detail', $item->slug) }}">
                                                                        <div class="product-card__image">
                                                                            <div class="image image--type--product">
                                                                                <a href="{{ route('product-detail', $item->slug) }}"
                                                                                    class="image__body">
                                                                                    <img class="image__tag"
                                                                                        src=" {{ optional($image)->image ? asset($image->image) : asset('admin_assets/no-image.jpg') }}"
                                                                                        alt="">
                                                                                </a>
                                                                            </div>
                                                                            {{-- {{ dd(session('cart')) }} --}}
                                                                        </div>
                                                                        <div class="product-card__info">
                                                                            <div class="product-card__meta"><span
                                                                                    class="product-card__meta-title"></span><a
                                                                                    href="{{ route('product-detail', $item->slug) }}">{{ $item->part_no }}</a>
                                                                            </div>
                                                                            <div class="product-card__name">
                                                                                <div>
                                                                                    {{-- <div class="product-card__badges">
                                                                                <div class="tag-badge tag-badge--sale">sale</div>
                                                                                <div class="tag-badge tag-badge--new">new</div>
                                                                                <div class="tag-badge tag-badge--hot">hot</div>
                                                                            </div> --}}
                                                                                    <a
                                                                                        href="{{ route('product-detail', $item->slug) }}">{{ $item->name }}</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-card__rating">
                                                                                {{-- <div class="rating product-card__rating-stars">
                                                                                <div class="rating__body">
                                                                                    <div class="rating__star rating__star--active"></div>
                                                                                    <div class="rating__star rating__star--active"></div>
                                                                                    <div class="rating__star rating__star--active"></div>
                                                                                    <div class="rating__star rating__star--active"></div>
                                                                                    <div class="rating__star"></div>
                                                                                </div>
                                                                            </div> --}}
                                                                                <div class="product-card__rating-label">
                                                                                    <a
                                                                                        href="{{ route('product-detail', $item->slug) }}">500</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="product-card__footer">
                                                                            <div class="product-card__prices">

                                                                                @if(Auth::check())

                                                                                {{-- <div
                                                                                    class="product-card__price product-card__price--current">
                                                                                    <a
                                                                                        href="{{ route('product-detail', $item->slug) }}">
                                                                                        ${{ number_format(getFinalItemPrice($item), 2) }}
                                                                                    </a>
                                                                                </div> --}}
                                                                                @else
                                                                                <div
                                                                                    class="product-card__price product-card__price--current">
                                                                                    <a
                                                                                        href="{{ route('product-detail', $item->slug) }}">
                                                                                        ${{ number_format($item->unit_price, 2) }}
                                                                                    </a>
                                                                                </div>
                                                                                @endif

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="product-card__footer">
                                                                        {{-- <button class="product-card__addtocart-icon" type="button"
                                                                        aria-label="Add to cart">
                                                                        <svg width="20" height="20">
                                                                            <circle cx="7" cy="17" r="2" />
                                                                            <circle cx="15" cy="17" r="2" />
                                                                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                                                                                        V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                                                                                    C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                                                                        </svg>
                                                                    </button> --}}
                                                                        <div class="dropdown" id="outer">
                                                                            <div class="inner">

                                                                                <a href="{{ route('product-detail', $item->slug) }}"
                                                                                    class="btn btn-primary bulk-order-btn"
                                                                                    style="border-radius: 26px;">
                                                                                    Bulk
                                                                                    Order</button>
                                                                                </a>
                                                                                <form action="{{ route('cart.add') }}"
                                                                                    method="post" enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <input type="hidden" name="itemid"
                                                                                        value="{{ $item->id }}" />
                                                                                    <button class="btn btn-primary buynow">Buy
                                                                                        Now</button>
                                                                                </form>
                                                                                {{-- <select id="orderDropdown"
                                                                        class="form-control order-dropdown">
                                                                        <option  selected>Select a Action
                                                                        </option>
                                                                        <option value="{{$item->id}}"  class="buy-option"><button>Buy Now</button></option>
                                                                        <option value="bulk"> <button class="btn btn-primary"
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModal">Bulk Order</button>
                                                                        </option>
                                                                    </select> --}}
                                                                            </div>
                                                                        </div>

                                                                        {{-- <button class="add-to-cart-button"  data-product-id="{{ $item->id }}" style="display:none;">Add
                                                                    to Cart</button> --}}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    @endforeach
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8">No results found.</td>
                                            </tr>
                                        @endif
                                    @else
                                        @foreach ($data as $key => $singleItem)
                                                {{-- {{dd($singleItem->category_id); }} --}}
                                            @foreach ($singleItem->Item as $item)
                                                @foreach ($item->ItemImage as $image)
                                                    <div class="products-list__content">
                                                        <div class="products-list__item">
                                                            <div class="product-card">
                                                                <a href="{{ route('product-detail', $item->slug) }}">
                                                                    <div class="product-card__image">
                                                                        <div class="image image--type--product">
                                                                            <a href="{{ route('product-detail', $item->slug) }}"
                                                                                class="image__body">
                                                                                <img class="image__tag"
                                                                                    src=" {{ optional($image)->image ? asset($image->image) : asset('admin_assets/no-image.jpg') }}"
                                                                                    alt="">
                                                                            </a>
                                                                        </div>
                                                                        {{-- {{ dd(session('cart')) }} --}}
                                                                    </div>
                                                                    <div class="product-card__info">
                                                                        <div class="product-card__meta"><span
                                                                                class="product-card__meta-title"></span><a
                                                                                href="{{ route('product-detail', $item->slug) }}">{{ $item->part_no }}</a>
                                                                        </div>
                                                                        <div class="product-card__name">
                                                                            <div>
                                                                                {{-- <div class="product-card__badges">
                                                                                    <div class="tag-badge tag-badge--sale">sale</div>
                                                                                    <div class="tag-badge tag-badge--new">new</div>
                                                                                    <div class="tag-badge tag-badge--hot">hot</div>
                                                                                </div> --}}
                                                                                <a
                                                                                    href="{{ route('product-detail', $item->slug) }}">{{ $item->name }}</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="product-card__rating">
                                                                            {{-- <div class="rating product-card__rating-stars">
                                                                                    <div class="rating__body">
                                                                                        <div class="rating__star rating__star--active"></div>
                                                                                        <div class="rating__star rating__star--active"></div>
                                                                                        <div class="rating__star rating__star--active"></div>
                                                                                        <div class="rating__star rating__star--active"></div>
                                                                                        <div class="rating__star"></div>
                                                                                    </div>
                                                                                </div> --}}
                                                                            <div class="product-card__rating-label">
                                                                                <a
                                                                                    href="{{ route('product-detail', $item->slug) }}">500</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-card__footer">
                                                                        <div class="product-card__prices">
                                                                            @if(Auth::check())
                                                                            @php
                                                                                $cat =  App\Models\OrganizationUser::where('category_id',$singleItem->category_id)->first();
                                                                                $comissionrate = $item->unit_price + ($item->unit_price * $cat->organization->commission_rate / 100);

                                                                            @endphp
                                                                            <div
                                                                                class="product-card__price product-card__price--current">
                                                                                <a
                                                                                    href="{{ route('product-detail', $item->slug) }}">
                                                                                    ${{ number_format($comissionrate, 2) }}
                                                                                </a>
                                                                            </div>
                                                                            @else
                                                                            <div
                                                                                class="product-card__price product-card__price--current">
                                                                                <a
                                                                                    href="{{ route('product-detail', $item->slug) }}">
                                                                                    ${{ number_format($item->unit_price, 2) }}
                                                                                </a>
                                                                            </div>
                                                                            @endif

                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                <div class="product-card__footer">
                                                                    {{-- <button class="product-card__addtocart-icon" type="button"
                                                                            aria-label="Add to cart">
                                                                            <svg width="20" height="20">
                                                                                <circle cx="7" cy="17" r="2" />
                                                                                <circle cx="15" cy="17" r="2" />
                                                                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                                                                                            V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                                                                                        C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                                                                            </svg>
                                                                        </button> --}}
                                                                    <div class="dropdown" id="outer">
                                                                        <div class="inner">

                                                                            <a href="{{ route('product-detail', $item->slug) }}"
                                                                                class="btn btn-primary bulk-order-btn"
                                                                                style="border-radius: 26px;">
                                                                                Bulk
                                                                                Order</button>
                                                                            </a>
                                                                            <form action="{{ route('cart.add') }}" method="post"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" name="itemid"
                                                                                    value="{{ $item->id }}" />
                                                                                <button class="btn btn-primary buynow">Buy
                                                                                    Now</button>
                                                                            </form>
                                                                            {{-- <select id="orderDropdown"
                                                                            class="form-control order-dropdown">
                                                                            <option  selected>Select a Action
                                                                            </option>
                                                                            <option value="{{$item->id}}"  class="buy-option"><button>Buy Now</button></option>
                                                                            <option value="bulk"> <button class="btn btn-primary"
                                                                                    data-toggle="modal"
                                                                                    data-target="#exampleModal">Bulk Order</button>
                                                                            </option>
                                                                        </select> --}}
                                                                        </div>
                                                                    </div>

                                                                    {{-- <button class="add-to-cart-button"  data-product-id="{{ $item->id }}" style="display:none;">Add
                                                                        to Cart</button> --}}
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endisset
                            </div>
                            <div class="products-view__pagination">
                                <nav aria-label="Page navigation example">
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
                                            <a class="page-link page-link--with-arrow" href="" aria-label="Next">
                                                <span class="page-link__arrow page-link__arrow--right"
                                                    aria-hidden="true"><svg width="7" height="11">
                                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                                                    C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="products-view__pagination-legend">
                                    Showing 6 of 98 products
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
    </div>
    </div>
    <!-- site__body / end -->

    </div>


    <!-- Modal for Bulk Order -->
    <div class="modal fade" id="bulkOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bulk Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" id="minus-btn">-</button>
                                </div>
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                    value="1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="plus-btn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="custom_price">Custom Price</label>
                            <input type="number" class="form-control" id="custom_price" name="custom_price">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Request Quotes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
