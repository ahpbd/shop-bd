@extends('frontend.layouts.app')

@section('content')
    <section class="gry-bg py-4">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-8 mx-auto">
                        <div class="card">
                            <div class="text-center pt-4">
                                <h1 class="h4 fw-600">
                                    {{ translate('Create your Al-Haramain Perfumes shopping Account')}}
                                </h1>
                            </div>
                            <div class="px-4 py-3 py-lg-4">
                                <div class="">
                                    <form id="reg-form" class="form-default" role="form" action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{  translate('Enter your first and last name') }}" name="name">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        @if (addon_is_activated('otp_system'))
                                            <div class="form-group phone-form-group">
                                                <input type="tel" id="phone-code" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="01xxxxxxxxx" name="phone" autocomplete="off" pattern="^\d{11}$" required>
                                            </div>

                                            

                                            <div class="form-group email-form-group d-none">
                                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Please enter your email') }}" name="email"  autocomplete="off">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            
                                        @else
                                            <div class="form-group">
                                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{  translate('Password (Minimum 6 characters with a number and a letter)') }}" name="password">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="{{  translate('Confirm Password (Minimum 6 characters with a number and a letter)') }}" name="password_confirmation">
                                        </div>

                                        @if(get_setting('google_recaptcha') == 1)
                                            <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                                            </div>
                                        @endif

                                        <div class="mb-3">
                                            <label class="aiz-checkbox">
                                                <input type="checkbox" name="checkbox_example_1" required>
                                                <span class=opacity-60>By signing up you agree to our <a href="{{ route('terms') }}">Terms of Use</a> and <a href="{{ route('privacypolicy') }}">Privacy Policy</a>.</span>
                                                <span class="aiz-square-check"></span>
                                            </label>
                                        </div>

                                        <div class="mb-5">
                                            <button type="submit" class="btn btn-primary btn-block fw-600">{{  translate('SIGN UP') }}</button>
                                        </div>
                                    </form>
                                    <div class="text-center mb-3">
                                    <p class="text-muted mb-0">{{ translate('Already member?')}} <a href="{{ route('user.login') }}">{{ translate('Login')}}</a> here.</p>
                                    
                                </div>
                                <div class="separator mb-3">
                                            <span class="bg-white px-3 opacity-60">{{ translate('Or, sign up with')}}</span>
                                            
                                </div>
                                <div class="text-center mb-2">
                                                <button class="btn btn-primary" type="button" onclick="toggleEmailPhone(this)">{{ translate('Sign up with Email') }}</button>
                                </div>
                                
                                    @if(get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1)
                                        <!--<div class="separator mb-3">
                                            <span class="bg-white px-3 opacity-60">{{ translate('Or Join With')}}</span>
                                        </div>-->
                                        <ul class="list-inline social colored text-center mb-3">
                                            @if (get_setting('facebook_login') == 1)
                                                <li class="list-inline-item mb-2" style="margin-right: 0!important;">
                                                    <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="facebook" style="display: inline-block;width: 330px!important;/* height: 36px; */border-radius: 0.2em;line-height: 39px;text-align: center;color: #fff;font-size: 24px;">
                                                        <i class="lab la-facebook-f"> Facebook</i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if(get_setting('google_login') == 1)
                                                <li class="list-inline-item mb-2" style="margin-right: 0!important;">
                                                    <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google" style="display: inline-block;width: 330px!important;/* height: 36px; */border-radius: 0.2em;line-height: 39px;text-align: center;color: #fff;font-size: 24px;">
                                                        <i class="lab la-google"></i> Google
                                                    </a>
                                                </li>
                                            @endif
                                            @if (get_setting('twitter_login') == 1)
                                                <li class="list-inline-item" style="margin-right: 0!important;">
                                                    <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="twitter" style="display: inline-block;width: 330px!important;/* height: 36px; */border-radius: 0.2em;line-height: 39px;text-align: center;color: #fff;font-size: 24px;">
                                                        <i class="lab la-twitter"> Twitter</i>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif
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
    @if(get_setting('google_recaptcha') == 1)
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif

    <script type="text/javascript">

        @if(get_setting('google_recaptcha') == 1)
        // making the CAPTCHA  a required field for form submission
        $(document).ready(function(){
            // alert('helloman');
            $("#reg-form").on("submit", function(evt)
            {
                var response = grecaptcha.getResponse();
                if(response.length == 0)
                {
                //reCaptcha not verified
                    alert("please verify you are humann!");
                    evt.preventDefault();
                    return false;
                }
                //captcha verified
                //do the rest of your validations here
                $("#reg-form").submit();
            });
        });
        @endif

        
        var isPhoneShown = true;
        function toggleEmailPhone(el){
            if(isPhoneShown){
                $('.phone-form-group').addClass('d-none');
                $('.email-form-group').removeClass('d-none');
                isPhoneShown = false;
                $(el).html('{{ translate('Sign up with Mobile') }}');
            }
            else{
                $('.phone-form-group').removeClass('d-none');
                $('.email-form-group').addClass('d-none');
                isPhoneShown = true;
                $(el).html('{{ translate('Sign up with Email') }}');
            }
        }
      
      
      
      

        function ValidateMobNumber() {
            var fld = document.getElementById("ContentPlaceHolder_txtSMSNotification");


            if (fld.value == "") {
                alert("You didn't enter a sms notification number.");
                fld.value = "";
                fld.focus();
                return false;
            }

            var mySplitResult = fld.value.substring(0, 2);

            if (mySplitResult != "01") {
                alert("Not in correct format");
                fld.value = "";
                fld.focus();
                return false;
            }
            if (isNaN(fld.value)) {
                alert("SMS notification number contains illegal characters.");
                fld.value = "";
                fld.focus();
                return false;
            }
            if (!(fld.value.length == 11)) {
                alert("SMS notification number is the wrong length. \nPlease enter 11 digit mobile no.");
                fld.value = "";
                fld.focus();
                return false;
            }

        }
           
    </script>
@endsection
