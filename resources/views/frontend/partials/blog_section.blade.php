<section class="mb-4">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                <div class="mb-3 align-items-baseline" style="text-align: center;">
                        <h3 class="h5 fw-700 mb-0" style="text-transform: uppercase;">
                            <span class="border-bottom border-primary border-width-2 pb-1 d-inline-block">{{ translate('Latest Blog') }}</span>
                        </h3>
                        
                    </div>
                <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="4" data-xl-items="4" data-lg-items="3"  data-md-items="3" data-sm-items="2" data-xs-items="1" data-arrows='true' data-infinite='true'>
                    @foreach (\App\Blog::where('status', 1)->orderBy('created_at', 'desc')->get() as $key => $blog)
                        <div class="carousel-box">
                            <div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
                                <div class="position-relative">
                                    <a href="{{ route('blog.details', $blog->slug) }}" class="d-block">
                                        <img
                                            class="img-fit lazyload mx-auto h-140px h-md-210px"
                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                            data-src="{{ uploaded_asset($blog->banner) }}"
                                            alt="{{ $blog->title }}"
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                        >
                                    </a>
                                </div>
                                <div class="p-4">
                        <h2 class="fs-18 fw-600 mb-1">
                            <a href="{{ url("blog").'/'. $blog->slug }}" class="text-reset">
                                {{  $blog->title  }}
                            </a>
                        </h2>
                        @if($blog->category != null)
                        <div class="mb-2 opacity-50">
                            <i>{{ $blog->category->category_name }}</i>
                        </div>
                        @endif
                        <p class="opacity-70 mb-4">
                            
                           {{ Illuminate\Support\Str::limit($blog->short_description, 100) }}
                        </p>
                        <a href="{{ url("blog").'/'. $blog->slug }}" class="btn btn-soft-primary">
                            View More </a>
                    </div>
                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!--
        
        
    <div class="container">
        <div class="card-columns">
            @foreach (\App\Blog::where('status', 1)->orderBy('created_at', 'desc')->get() as $key => $blog)
                <div class="card mb-3 overflow-hidden shadow-sm">
                    <a href="{{ url("blog").'/'. $blog->slug }}" class="text-reset d-block">
                        <img
                            src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                            data-src="{{ uploaded_asset($blog->banner) }}"
                            alt="{{ $blog->title }}"
                            class="img-fluid lazyload "
                        >
                    </a>
                    <div class="p-4">
                        <h2 class="fs-18 fw-600 mb-1">
                            <a href="{{ url("blog").'/'. $blog->slug }}" class="text-reset">
                                {{  $blog->title  }}
                            </a>
                        </h2>
                        @if($blog->category != null)
                        <div class="mb-2 opacity-50">
                            <i>{{ $blog->category->category_name }}</i>
                        </div>
                        @endif
                        <p class="opacity-70 mb-4">
                            {{ $blog->short_description }}
                        </p>
                        <a href="{{ url("blog").'/'. $blog->slug }}" class="btn btn-soft-primary">
                            View More
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>-->
        
</section>