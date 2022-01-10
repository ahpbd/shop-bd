@php
if(auth()->user() != null) {
    $user_id = Auth::user()->id;
    $cart = \App\Cart::where('user_id', $user_id)->get();
} else {
    $temp_user_id = Session()->get('temp_user_id');
    if($temp_user_id) {
        $cart = \App\Cart::where('temp_user_id', $temp_user_id)->get();
    }
}

@endphp
<style>
.rounded-full {
    border-radius: 9999px;
}
.shadow, .shadow-xl {
    box-shadow: var(--tw-ring-offset-shadow,0 0 transparent),var(--tw-ring-shadow,0 0 transparent),var(--tw-shadow);
}
.shadow {
    --tw-shadow: 0 1px 3px 0 rgba(0,0,0,0.1),0 1px 2px 0 rgba(0,0,0,0.06);
}
</style>

@auth
 @if(isAdmin())
 <a href="javascript:void(0)" class="d-flex align-items-center text-reset h-100" data-toggle="dropdown" data-display="static">
    <i class="las la-user-secret la-2x opacity-80 p-2 bg-white rounded-full shadow"></i>
    
</a>
<div class="dropdown-menu dropdown-menu-right p-0 stop-propagation" style="border: 0px solid rgba(0,0,0,0)!important;">
    
            <div class="modal-content">
                
                <div class="sidemnenu mb-3">
                    <ul class="aiz-side-nav-list" data-toggle="aiz-side-menu">

                        <li class="aiz-side-nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="aiz-side-nav-link {{ areActiveRoutes(['dashboard'])}}">
                            <i class="las la-home aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Admin Panel') }}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a class="aiz-side-nav-link" href="{{ route('logout') }}">
                            <i class="las la-sign-out-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Log Out')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        
</div>
 @else
  <a href="javascript:void(0)" class="d-flex align-items-center text-reset h-100" data-toggle="dropdown" data-display="static">
    <i class="las la-user-tie la-2x opacity-80 p-2 bg-white rounded-full shadow"></i>
    
</a>
<div class="dropdown-menu dropdown-menu-right p-0 stop-propagation" style="border: 0px solid rgba(0,0,0,0)!important;">
    
            <div class="modal-content">
                <div class="p-4 text-xl-center border-bottom bg-primary text-white position-relative">
                    <span class="avatar avatar-md mb-3">
                        @if (Auth::user()->avatar_original != null)
                        <img src="{{ uploaded_asset(Auth::user()->avatar_original) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                        @else
                        <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="image rounded-circle" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                        @endif
                    </span>
                    <h4 class="h5 fs-16 mb-1 fw-600">{{ Auth::user()->name }}</h4>
                        @if(Auth::user()->phone != null)
                        <div class="text-truncate opacity-60">{{ Auth::user()->phone }}</div>
                        @else
                        <div class="text-truncate opacity-60">{{ Auth::user()->email }}</div>
                        @endif
            </div>
                <div class="sidemnenu mb-3">
                    <ul class="aiz-side-nav-list" data-toggle="aiz-side-menu">

                        <li class="aiz-side-nav-item">
                            <a href="{{ route('dashboard') }}" class="aiz-side-nav-link {{ areActiveRoutes(['dashboard'])}}">
                            <i class="las la-home aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Dashboard') }}</span>
                            </a>
                        </li>

                        <li class="aiz-side-nav-item">
                            <a href="{{ route('profile') }}" class="aiz-side-nav-link {{ areActiveRoutes(['profile'])}}">
                            <i class="las la-user aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Manage Profile')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a class="aiz-side-nav-link" href="{{ route('logout') }}">
                            <i class="las la-sign-out-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Log Out')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        
</div>
@endif
@else
<a href="javascript:void(0)" class="d-flex align-items-center text-reset h-100" data-toggle="dropdown" data-display="static">
    <i class="lar la-user la-2x opacity-80 p-2 bg-white rounded-full shadow"></i>
    
</a>

<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg p-0 stop-propagation" style="border: 0px solid rgba(0,0,0,0)!important;">
    
            <div class="modal-content">
                <div class="modal-header" style="background-color: #e5e7eb!important">
                    <h6 class="modal-title fw-600">{{ translate('Login')}}</h6>
                </div>
                <div class="modal-body" style="overflow-y: hidden;">
                    
                        <form class="form-default" role="form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                
                                @if (addon_is_activated('otp_system'))
                                <span class="text-gray fw-600">Phone Number or Email*</span>
                                    <input type="text" class="form-control h-auto form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ translate('Please enter your Phone Number or Email')}}" name="email" id="email">
                                @else
                                <span class="text-gray fw-600">Email Address</span>
                                    <input type="email" class="form-control h-auto form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email">
                                @endif
                                @if (addon_is_activated('otp_system'))
                                    <!--<span class="opacity-60">{{  translate('Use country code before number') }}</span>-->
                                @endif
                            </div>

                            <div class="form-group">
                                <span class="text-gray fw-600">Password*</span>
                                <input type="password" name="password" class="form-control h-auto form-control-lg" placeholder="{{ translate('Please enter your password')}}">
                            </div>

                            <!--<div class="row mb-2">
                                <div class="col-6">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class=opacity-60>{{  translate('Remember Me') }}</span>
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('password.request') }}" class="text-reset opacity-60 fs-14">{{ translate('Forgot password?')}}</a>
                                </div>
                            </div>-->

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-block fw-600">{{  translate('Login') }}</button>
                            </div>
                        </form>

                    
                    <div class="text-center mb-0">
                        <p class="text-muted mb-0">{{ translate('Dont have an account?')}} <a href="{{ route('user.registration') }}">{{ translate('Sign Up')}}</a></p>
                        <a href="{{ route('password.request') }}">{{ translate('Forgot password?')}}</a>
                    </div>
                    @if(get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1)
                        <div class="separator mb-2">
                            <span class="bg-white px-3 opacity-60">{{ translate('Or Login With')}}</span>
                        </div>
                        <ul class="list-inline social colored text-center mb-3">
                            @if (get_setting('facebook_login') == 1)
                                <li class="list-inline-item" style="margin-right: 0!important;">
                                    <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="facebook" style="display: inline-block;width: 130px!important;/* height: 36px; */border-radius: 0.2em;line-height: 39px;text-align: center;color: #fff;font-size: 24px;">
                                        <i class="lab la-facebook-f"> Facebook</i>
                                    </a>
                                </li>
                            @endif
                            @if(get_setting('google_login') == 1)
                                <li class="list-inline-item" style="margin-right: 0!important;">
                                    <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google" style="display: inline-block;width: 130px!important;/* height: 36px; */border-radius: 0.2em;line-height: 39px;text-align: center;color: #fff;font-size: 24px;">
                                        <i class="lab la-google"> Google</i>
                                    </a>
                                </li>
                            @endif
                            @if (get_setting('twitter_login') == 1)
                                <li class="list-inline-item">
                                    <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="twitter">
                                        <i class="lab la-twitter"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    @endif
                </div>
            </div>
        
    
</div>

@endauth