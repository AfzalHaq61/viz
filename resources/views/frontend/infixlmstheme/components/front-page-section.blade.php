<div>
    <div class="contact_section ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="contact_address">
                        <div class="row justify-content-center">
                            <div class="col-xl-12">
                                <div class="row justify-content-between">
                                    <div class="col-lg-12 p-5">
                                        <div class="contact_title">
                                            <h4 class="mb-0">{{ $page->title }}</h4>
                                        </div>
                                        <div class="address_lines py-3">
                                            {!! $page->details !!}
                                        </div>
                                    </div>

                                    {{-- FUTURE COURSES --}}

                                    @if (isset($top_courses))
                                        <div class="col-12">
                                            <div class="row mb-5">
                                                @foreach ($top_courses as $course)
                                                    @if ($course->future_course == 1)
                                                        <div class="col-lg-6 col-xl-4">
                                                            <div class="couse_wizged">
                                                                <a
                                                                    href="{{ courseDetailsUrl(@$course->id, @$course->type, @$course->slug) }}">
                                                                    <div class="thumb">

                                                                        <div class="thumb_inner lazy"
                                                                            data-src="{{ getCourseImage($course->thumbnail) }}">
                                                                        </div>
                                                                        <x-price-tag :price="$course->price"
                                                                            :discount="$course->discount_price" />
                                                                    </div>
                                                                </a>
                                                                <div class="course_content">
                                                                    <a
                                                                        href="{{ courseDetailsUrl(@$course->id, @$course->type, @$course->slug) }}">

                                                                        <h4 class="noBrake"
                                                                            title=" {{ $course->title }}">
                                                                            {{ $course->title }}
                                                                        </h4>
                                                                    </a>

                                                                    <div class="rating_cart">
                                                                        <div class="rateing">
                                                                            <span>{{ $course->totalReview }}/5</span>
                                                                            <i class="fas fa-star"></i>
                                                                        </div>
                                                                        @auth()
                                                                            @if (!$course->isLoginUserEnrolled && !$course->isLoginUserCart)
                                                                                <a href="#" class="cart_store"
                                                                                    data-id="{{ $course->id }}">
                                                                                    <i class="fas fa-shopping-cart"></i>
                                                                                </a>
                                                                            @endif
                                                                        @endauth
                                                                        @guest()
                                                                            @if (!$course->isGuestUserCart)
                                                                                <a href="#" class="cart_store"
                                                                                    data-id="{{ $course->id }}">
                                                                                    <i class="fas fa-shopping-cart"></i>
                                                                                </a>
                                                                            @endif
                                                                        @endguest

                                                                    </div>
                                                                    <div class="course_less_students">
                                                                        <a> <i class="ti-agenda"></i>
                                                                            {{ count($course->lessons) }}
                                                                            {{ __('frontend.Lessons') }}</a>
                                                                        <a>
                                                                            <i class="ti-user"></i>
                                                                            {{ $course->total_enrolled }}
                                                                            {{ __('frontend.Students') }}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
