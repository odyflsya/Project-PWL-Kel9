@extends('frontend.layouts.master')

@section('content')
    <!--=============================
                            BREADCRUMB START
                        ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>menu Details</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li><a href="javascript:;">menu Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                            BREADCRUMB END
                        ==============================-->


    <!--=============================
                            MENU DETAILS START
                        ==============================-->
    <section class="fp__menu_details mt_115 xs_mt_85 mb_95 xs_mb_65">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-9 wow fadeInUp" data-wow-duration="1s">
                    <div class="exzoom hidden" id="exzoom">
                        <div class="exzoom_img_box fp__menu_details_images">
                            <ul class='exzoom_img_ul'>
                                <li><img class="zoom ing-fluid w-100" src="{{ asset($product->thumb_image) }}"
                                        alt="product"></li>

                                @foreach ($product->productImages as $image)
                                    <li><img class="zoom ing-fluid w-100" src="{{ asset($image->image) }}" alt="product">
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="far fa-chevron-left"></i>
                            </a>
                            <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="far fa-chevron-right"></i>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__menu_details_text">
                        <h2>{!! $product->name !!}</h2>
                        @if ($product->reviews_avg_rating)
                        <p class="rating">
                            @for ($i = 1; $i <= $product->reviews_avg_rating; $i++)
                            <i class="fas fa-star"></i>
                            @endfor
                            <span>({{ $product->reviews_count }})</span>
                        </p>
                        @endif



                <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__menu_description_area mt_100 xs_mt_70">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Reviews</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="menu_det_description">
                                    {!! $product->short_description !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <div class="fp__review_area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4>{{ count($reviews) }} reviews</h4>
                                            <div class="fp__comment pt-0 mt_20">
                                                @foreach ($reviews as $review)
                                                <div class="fp__single_comment m-0 border-0">
                                                    <img src="{{asset($review->user->avatar)}}" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>{{ $review->user->name }} <span>{{ date('d m Y', strtotime($review->created_at)) }} </span></h3>
                                                        <span class="rating">
                                                            @for ($i = 1; $i <= $review->rating; $i++)
                                                            <i class="fas fa-star"></i>
                                                            @endfor


                                                        </span>
                                                        <p>{{ $review->review }}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @if ($reviews->hasPages())
                                                <div class="fp__pagination mt_60">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            {{ $reviews->links() }}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if (count($reviews) === 0)
                                                    <div class="alert alert-warning mt-4">No review found!</div>
                                                @endif

                                            </div>

                                        </div>
                                        @auth
                                        <div class="col-lg-4">
                                            <div class="fp__post_review">
                                                <h4>write a Review</h4>
                                                <form action="{{ route('product-review.store') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xl-12 mt-3">
                                                            <label> Choose a rating</label>
                                                            <select name="rating" id="rating_input" class="form-control ">
                                                                <option value="5">5</option>
                                                                <option value="4">4</option>
                                                                <option value="3">3</option>
                                                                <option value="2">2</option>
                                                                <option value="1">1</option>
                                                            </select>
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        </div>

                                                        <div class="col-xl-12">
                                                            <label for="">Review</label>
                                                            <textarea style="margin-top: 2px" name="review" rows="3" placeholder="Write your review"></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="common_btn" type="submit">submit
                                                                review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-lg-4">
                                            <h4>write a Review</h4>
                                            <div class="alert alert-warning mt-4">Please login first to add review.</div>
                                        </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

