@extends('website.layouts.master')
@section('content')
    <!-- site -->
    <div class="site">
        <!-- site__body -->
        <div class="site__body">
            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container container--max--lg">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 d-flex">
                            <div class="card flex-grow-1 mb-md-0 mr-0 mr-lg-3 ml-0 ml-lg-4">
                                <div class="card-body card-body--padding--2">
                                    <h3 class="card-title">Login</h3>
                                    <form  method="POST" action="{{ route('user.login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="signin-email">Username / Email</label>
                                            <input id="signin-email" type="text" class="form-control" placeholder="Username / Email" name="username_email">
                                        </div>
                                        <div class="form-group">
                                            <label for="signin-password">Password</label>
                                            <input id="signin-password" type="password" class="form-control" placeholder="Secret word" name="password">
                                            <small class="form-text text-muted">
                                                <a href="{{route('forgot-password') }}">Forgot password?</a>
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <span class="input-check form-check-input">
                                                    <span class="input-check__body">
                                                        <input class="input-check__input" type="checkbox" id="signin-remember">
                                                        <span class="input-check__box"></span>
                                                        <span class="input-check__icon"><svg width="9px" height="7px">
                                                                <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                            </svg>
                                                        </span>
                                                    </span>
                                                </span>
                                                <label class="form-check-label" for="signin-remember">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="mt-3 form-group mb-0 d-flex align-items-center">
                                            <button type="submit" class="btn btn-primary">Login</button>
                                            <small class="form-text text-muted" style="font-weight: 500;">
                                                <a href="{{route('register') }}">&nbsp; Or Create An Account</a>
                                            </small>
                                        </div>
                                    </form>
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
@endsection
