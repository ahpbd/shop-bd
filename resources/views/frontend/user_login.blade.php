@extends('frontend.layouts.app')

@section('content')
    <section class="gry-bg py-5">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-8 mx-auto">
                        <div class="card">
                            <div class="text-center pt-4">
                                <h1 class="h4 fw-600">
                                    {{ translate('Welcome to Al-Haramain Perfumes! Please login.')}}
                                </h1>
                            </div>

                            <div class="px-4 py-3 py-lg-4">
                                <div class="">
                                    <form class="form-default" role="form" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            @if (addon_is_activated('otp_system'))
                                                <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ translate('Please enter your Phone Number or Email')}}" name="email" id="email">
                                            @else
                                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email">
                                            @endif
                                            @if (addon_is_activated('otp_system'))
                                                <!--<span class="opacity-60">{{  translate('Use country code before number') }}</span>-->
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ translate('Please enter your password')}}" name="password" id="password">
                                        </div>

                                        <div class="row mb-2">
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
                                        </div>

                                        <div class="mb-5">
                                            <button type="submit" class="btn btn-primary btn-block fw-600">{{  translate('Login') }}</button>
                                        </div>
                                    </form>

                                    

                                    @if(get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1)
                                        <div class="separator mb-3">
                                            <span class="bg-white px-3 opacity-60">{{ translate('Or Login With')}}</span>
                                        </div>
                                        <ul class="list-inline social colored text-center mb-5">
                                            @if (get_setting('facebook_login') == 1)
                                                <li class="list-inline-item" style="margin-right: 0!important;">
                                                    <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="facebook" style="display: inline-block;width: 330px!important;/* height: 36px; */border-radius: 0.2em;line-height: 39px;text-align: center;color: #fff;font-size: 24px;">
                                                        <i class="lab la-facebook-f"> Facebook</i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if(get_setting('google_login') == 1)
                                                <li class="list-inline-item" style="margin-right: 0!important;">
                                                    <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google" style="display: inline-block;width: 330px!important;/* height: 36px; */border-radius: 0.2em;line-height: 39px;text-align: center;color: #fff;font-size: 24px;">
                                                        <i class="lab la-google"> Google</i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (get_setting('twitter_login') == 1)
                                                <li class="list-inline-item">
                                                    <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="twitter" style="display: inline-block;width: 330px!important;/* height: 36px; */border-radius: 0.2em;line-height: 39px;text-align: center;color: #fff;font-size: 24px;">
                                                        <i class="lab la-twitter"> Twitter</i>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <p class="text-muted mb-0">{{ translate('New member?')}} <a href="{{ route('user.registration') }}">{{ translate('Register')}}</a> here.</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        
    </script>
@endsection
