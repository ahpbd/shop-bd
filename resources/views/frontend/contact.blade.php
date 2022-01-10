@extends('frontend.layouts.app')
<script src='https://www.google.com/recaptcha/api.js'></script>

@section('content')

<!-- Contact Us Area Start -->
    <div class="container">
      <div class="row">
          
        <div class="col-md-6" style="padding-top: 20px;">
          <div class="card">
            <div class="card-header">
              <h4 class="fw-600">WE'D LOVE TO HEAR FROM YOU</h4><br/>
              <p>Send us a message and we' ll respond as soon as possible</p>
            </div>
             <div class="card-body">
               <form method="POST" action="{{ route('contact.submit') }}" enctype="multipart/form-data" onsubmit="return submitUserForm();">
                 @csrf
                 <div class="form-group">
                   <label for="name">Name</label>
                   <input type="text" name="name" value="" class="form-control" required />
                 </div>
                 <div class="form-group">
                   <label for="email">Email</label>
                   <input type="email" name="email" value="" class="form-control" required />
                 </div>
                 <div class="form-group">
                   <label for="phone">Phone</label>
                   <input type="text" name="phone" value="" class="form-control" required />
                 </div>
                 <div class="form-group">
                   <label for="msg">Message</label>
                   <textarea name="msg" class="form-control"></textarea>
                 </div>
                 <div class="g-recaptcha" data-sitekey="6LeWtuscAAAAALjii4R007_SDq508bYKtZ2LUDhh" data-callback="verifyCaptcha"/></div>
                    <div id="g-recaptcha-error"></div>
                 <input type="submit" class="btn btn-primary" value="Submit" style="max-width: 100%;width: 100%;" />
               </form>
             </div>
          </div>
          
        </div>
        <div class="col-md-6" style="padding-top: 20px;">
          <div class="card">
              <div class="card-body">
                  <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2"><i class="las la-building aiz-side-nav-icon"></i> Corporate Head Office</h4>
                  <ul class="list-unstyled">
                    <li class="mb-2 ">
                           
                           <span class="d-block opacity-70"><i class="las la-map-marker-alt aiz-side-nav-icon"></i> {{ get_setting('contact_address',null,App::getLocale()) }}</span>
                        </li>
                        <li class="mb-2">
                           
                           <span class="d-block opacity-70"><i class="las la-phone aiz-side-nav-icon"></i> {{ get_setting('contact_phone') }}</span>
                        </li>
                        <li class="mb-2">
                           
                           <span class="d-block opacity-70"><i class="las la-envelope aiz-side-nav-icon"></i> 
                               <a href="mailto:{{ get_setting('contact_email') }}" class="text-reset">{{ get_setting('contact_email')  }}</a>
                            </span>
                        </li>
                        </ul>
                    <h4 class="fs-13 text-uppercase fw-600 border-gray-900 pb-2">FOLLOW US</h4>
                        @if ( get_setting('show_social_links') )
                <ul class="list-inline my-3 my-md-0 social colored">
                    @if ( get_setting('facebook_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('facebook_link') }}" target="_blank" class="facebook"><i class="lab la-facebook-f" style="margin-top: 10px;"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('twitter_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('twitter_link') }}" target="_blank" class="twitter"><i class="lab la-twitter" style="margin-top: 10px;"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('instagram_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('instagram_link') }}" target="_blank" class="instagram"><i class="lab la-instagram" style="margin-top: 10px;"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('youtube_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('youtube_link') }}" target="_blank" class="youtube"><i class="lab la-youtube" style="margin-top: 10px;"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('linkedin_link') !=  null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('linkedin_link') }}" target="_blank" class="linkedin"><i class="lab la-linkedin-in" style="margin-top: 10px;"></i></a>
                    </li>
                    @endif
                </ul>  
                @endif
                
                </div><div class="card-body">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1824.2811573275978!2d90.3946935!3d23.8696711!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c43d476a2dc9%3A0xb9c31936a97b3e9b!2sAl%20Haramain%20Perfumes%20Pvt.%20Ltd.%20-%20Corporate%20Office!5e0!3m2!1sen!2sbd!4v1634971726771!5m2!1sen!2sbd" width="100%" height="299" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div></div>
         </div>
      </div>
    </div>
    <!-- Contact Us Area End-->


@endsection
@section('script')
<script>

var recaptcha_response = '';
function submitUserForm() {
    if(recaptcha_response.length == 0) {
        document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;"><b>Captcha is required.</b></span>';
        return false;
    }
    return true;
}
 
function verifyCaptcha(token) {
    recaptcha_response = token;
    document.getElementById('g-recaptcha-error').innerHTML = '';
}
</script>
@endsection