@section('css')
<style>
    .course_area {
        padding-top: 120px;
    }

    .course_even {
        background-size: cover;
        background-position: 50%;
        padding: 5rem 5rem;
    }

    .course_odd {
        padding: 5rem 5rem;
    }

    .course_icon_container {
        max-width: 12.5rem;
    }

    .course_icon {
        padding-bottom: 20px;
    }

    .course_tumbnail_container {
        max-width: 12.5rem;
    }

    .course_tumbnail {
        width: 500px;
        height: 500px;
    }
</style>
@endsection

<div>
    <div class="course_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section__title text-center mb_80">
                        <h3>
                            {{@$homeContent->course_title}}
                        </h3>
                        <p>
                            {{@$homeContent->course_sub_title}}
                        </p>
                    </div>
                </div>
            </div>

            <div>
                @if(isset($top_courses))
                @foreach($top_courses as $course)
                @if($course->id% 2 != 0)
                <div class="course_even row thumb_inner lazy" data-src="{{$course->course_background_image}}">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="px-5">
                            <div class="course_content">
                                <div class="course_icon_container">
                                    <img class="course_icon" src="{{$course->course_icon}}" alt="">
                                </div>
                                <a href="{{courseDetailsUrl(@$course->id,@$course->type,@$course->slug)}}">

                                    <h2 class="noBrake text-white" title=" {{$course->title}}">
                                        {{$course->title}}
                                    </h2>
                                </a>

                                @if(!is_null(json_decode($course->course_feature, true)) && count(json_decode($course->course_feature, true)))
                                <div>
                                    @foreach(json_decode($course->course_feature, true) as $course_feature)
                                    <span class="row pl-3 text-white"><i class="ti-check font-weight-bold pt-1 pr-2"></i>
                                        <h5 class="text-white">{{$course_feature}}</h5>
                                    </span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div>
                            <img class="course_tumbnail" src="{{$course->image}}" alt="">
                        </div>
                    </div>
                </div>
                @else
                <div class="course_odd row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div>
                            <img class="course_tumbnail" src="{{$course->image}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="px-5">
                            <div class="course_content">
                                <div class="course_icon_container">
                                    <img class="course_icon" src="{{$course->course_icon}}" alt="">
                                </div>
                                <a href="{{courseDetailsUrl(@$course->id,@$course->type,@$course->slug)}}">

                                    <h2 class="noBrake" title=" {{$course->title}}">
                                        {{$course->title}}
                                    </h2>
                                </a>

                                @if(!is_null(json_decode($course->course_feature, true)) && count(json_decode($course->course_feature, true)))
                                <div>
                                    @foreach(json_decode($course->course_feature, true) as $course_feature)
                                    <span class="row pl-3"><i class="ti-check font-weight-bold pt-1 pr-2"></i>
                                        <h5>{{$course_feature}}</h5>
                                    </span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endif

            </div>


            <div class="row">
                @if(isset($top_courses))
                @foreach($top_courses as $course)
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="couse_wizged">
                        <a href="{{courseDetailsUrl(@$course->id,@$course->type,@$course->slug)}}">
                            <div class="thumb">

                                <div class="thumb_inner lazy" data-src="{{ getCourseImage($course->thumbnail) }}">
                                </div>
                                <x-price-tag :price="$course->price" :discount="$course->discount_price" />
                            </div>
                        </a>
                        <div class="course_content">
                            <a href="{{courseDetailsUrl(@$course->id,@$course->type,@$course->slug)}}">

                                <h4 class="noBrake" title=" {{$course->title}}">
                                    {{$course->title}}
                                </h4>
                            </a>

                            <div class="rating_cart">
                                <div class="rateing">
                                    <span>{{$course->totalReview}}/5</span>
                                    <i class="fas fa-star"></i>
                                </div>
                                @auth()
                                @if(!$course->isLoginUserEnrolled && !$course->isLoginUserCart)
                                <a href="#" class="cart_store" data-id="{{$course->id}}">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                                @endif
                                @endauth
                                @guest()
                                @if(!$course->isGuestUserCart)
                                <a href="#" class="cart_store" data-id="{{$course->id}}">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                                @endif
                                @endguest

                            </div>
                            <div class="course_less_students">
                                <a> <i class="ti-agenda"></i> {{count($course->lessons)}}
                                    {{__('frontend.Lessons')}}</a>
                                <a>
                                    <i class="ti-user"></i> {{$course->total_enrolled}} {{__('frontend.Students')}}
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
                @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-12 text-center pt_70">
                    <a href="{{route('courses')}}" class="theme_btn mb_30">{{__('frontend.View All Courses')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>