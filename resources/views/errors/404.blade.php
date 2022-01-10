@extends('frontend.layouts.app')

@section('content')
<section class="text-center py-6">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mx-auto">
				<img src="{{ static_asset('assets/img/404.png') }}" class="mw-100 mx-auto mb-5" height="300">
			    <h1 class="fw-700">{{ translate('Page Not Found!') }}</h1>
			    <p class="fs-16 opacity-60">If you need to you can always <a href="mailto:bd.online@alharamainperfumes.com">contact us</a> or Call us : <a href="tel:+8801922257777">+8801922257777</a></p>
			</div>
		</div>
    </div>
</section>
@endsection
