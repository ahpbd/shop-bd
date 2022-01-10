@extends('frontend.layouts.app')

@section('content')

    @if($flash_deal->status == 1 && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date) 
    <div>
          @if(strtotime(date('Y-m-d H:i:s')) <= $flash_deal->start_date)
          <section class="text-center" style="background-color: {{ $flash_deal->background_color }};background-size: cover;">
          @else
          <section class="text-center mb-5" style="background-color: {{ $flash_deal->background_color }};background-size: cover;">
          @endif
            <div class="container">
            <div class="row">
            
              <div class="col-md-6">
                <img
                    src="{{ uploaded_asset($flash_deal->banner) }}"
                    data-src="{{ uploaded_asset($flash_deal->banner) }}"
                    alt="{{ $flash_deal->title }}"
                    class="img-fit w-100 lazyload" style="width: 50%!important; padding: 15px;margin-bottom:15px;margin-top:15px;"
                >
                <h5 class="text-center" style="color: {{ $flash_deal->text_color }};margin-top: -20px;margin-bottom: 40px;">Campaign Period <i class="las la-clock" aria-hidden="true"></i>  {{ date('d M, l h:i a', $flash_deal->start_date) }} to {{ date('l h:i a', $flash_deal->end_date) }}</h5>
                
              </div>
              @if(strtotime(date('Y-m-d H:i:s')) <= $flash_deal->start_date)
              <div class="col-md-6">
                  <h1 class="text-center text-white h2" style="margin-top: 50px;">Coming Soon...</h1>
                <div class="aiz-count-down aiz-count-down-lg ml-3 align-items-center justify-content-center" data-date="{{ date('Y/m/d H:i:s', $flash_deal->start_date) }}"></div>
                <h1 class="h4 text-center custom-event-date" style="color: {{ $flash_deal->text_color }};margin-top: 15px; font-family: kalpurush;font-weight:bold;"> বছরের শেষে, সুগন্ধির দেশে </h1>
              </div>
              
              @else
              <div class="col-md-6">
                  <h1 class="text-center h2" style="color: {{ $flash_deal->text_color }};margin-top: 50px;">Campaign End in</h1>
                <div class="aiz-count-down aiz-count-down-lg ml-3 align-items-center justify-content-center" data-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                <h1 class="h4 text-center custom-event-date" style="color: {{ $flash_deal->text_color }};margin-top: 15px; font-family: kalpurush;font-weight:bold;"> বছরের শেষে, সুগন্ধির দেশে </h1>
              </div>
              @endif
            </div>
            </div>
            
        </section>
          @if(strtotime(date('Y-m-d H:i:s')) <= $flash_deal->start_date)
          
          @else
        <section class="mb-4">
            <div class="container">
                <div class="text-center my-4">
                    <h1 class="h2 fw-600 text-black" style="font-family: kalpurush;font-weight:bold;">{{ $flash_deal->title }}</h1>
                    
                </div>
                <div class="row gutters-5 row-cols-xxl-4 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-2">
                    @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                        @php
                            $product = \App\Product::find($flash_deal_product->product_id);
                        @endphp
                        {{--@if ($product->published != 0)--}}
                            <div class="col mb-2">
                                @include('frontend.partials.product_campaign',['product' => $product])
                            </div>
                        {{--@endif--}}
                    @endforeach
                </div>
            </div>
        </section>
          @endif
    </div>
    @else
        <div style="background-color:{{ $flash_deal->background_color }}">
            <section class="text-center">
                <img src="{{ uploaded_asset($flash_deal->banner) }}" alt="{{ $flash_deal->title }}" class="img-fit w-25 lazyload">
            </section>
            <section class="pb-4">
                <div class="container">
                    <div class="text-center text-{{ $flash_deal->text_color }}">
                        <h1 class="h3 my-4">{{ $flash_deal->title }} {{  translate(' has been expired.') }}</h1>
                        <!--<p class="h4">{{  translate('This offer has been expired.') }}</p>-->
                    </div>
                </div>
            </section>
        </div>
    @endif
@endsection
