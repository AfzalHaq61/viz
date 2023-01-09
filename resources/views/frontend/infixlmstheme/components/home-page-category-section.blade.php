@section('css')
    <style>
        .course_even {
            background-size: cover;
            background-position: 50%;
            padding: 5rem 5rem;
        }

        .course_odd {
            padding: 5rem 5rem;
        }

        .course_icon_container {
            padding-bottom: 1.5rem;
        }

        .course_icon {
            max-width: 12.5rem;
        }

        .course_title_container {
            padding-bottom: 1.5rem;
        }

        .course_tumbnail_container {
            max-width: 12.5rem;
        }

        .course_tumbnail {
            width: 100%;
            height: 400px;
        }

        @media (max-width: 600px) {

            .course_odd,
            .course_even {
                padding: 3rem 3rem;
            }

            .course_tumbnail {
                height: 300px;
            }
        }
    </style>
@endsection

<div>
    <div class="category_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    @if (isset($homeContent))
                        @if ($homeContent->show_key_feature == 1)

                            <div class="couses_category">
                                <div class="row">
                                    <div class="col-xl-4 col-md-4">
                                        <div class="single_course_cat">
                                            <div class="icon">
                                                @if (!empty($homeContent->key_feature_logo1))
                                                    <img src="{{ asset($homeContent->key_feature_logo1) }}"
                                                        alt="">
                                                @endif
                                            </div>
                                            <div class="course_content">
                                                <h4>
                                                    @if (!empty($homeContent->feature_link1))
                                                        <a href="{{ $homeContent->feature_link1 }}">
                                                    @endif
                                                    {{ $homeContent->key_feature_title1 }}
                                                    @if (!empty($homeContent->feature_link1))
                                                        </a>
                                                    @endif
                                                </h4>
                                                <p>{{ $homeContent->key_feature_subtitle1 }} </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-md-4">
                                        <div class="single_course_cat">
                                            <div class="icon">
                                                @if (!empty($homeContent->key_feature_logo2))
                                                    <img src="{{ asset($homeContent->key_feature_logo2) }}"
                                                        alt="">
                                                @endif
                                            </div>
                                            <div class="course_content">
                                                <h4>
                                                    @if (!empty($homeContent->feature_link2))
                                                        <a href="{{ $homeContent->feature_link2 }}">
                                                    @endif
                                                    {{ $homeContent->key_feature_title2 }}
                                                    @if (!empty($homeContent->feature_link2))
                                                        </a>
                                                    @endif
                                                </h4>
                                                <p>{{ $homeContent->key_feature_subtitle2 }} </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-md-4">
                                        <div class="single_course_cat">
                                            <div class="icon">
                                                @if (!empty($homeContent->key_feature_logo3))
                                                    <img src="{{ asset($homeContent->key_feature_logo3) }}"
                                                        alt="">
                                                @endif
                                            </div>
                                            <div class="course_content">
                                                <h4>
                                                    @if (!empty($homeContent->feature_link3))
                                                        <a href="{{ $homeContent->feature_link3 }}">
                                                    @endif
                                                    {{ $homeContent->key_feature_title3 }}
                                                    @if (!empty($homeContent->feature_link3))
                                                        </a>
                                                    @endif
                                                </h4>
                                                <p>{{ $homeContent->key_feature_subtitle3 }} </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center">
                @if (isset($homeContent->enable_video) && isset($homeContent->video_url) && $homeContent->enable_video)
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-sm-8 mx-auto mb-5">
                                @php
                                    $videoUrl = explode('=', $homeContent->video_url);
                                    $videoUrl = isset($videoUrl[1]) ? $videoUrl[1] : '';
                                @endphp
                                <iframe width="100%" height="500"
                                    src="{{ 'https:\/\/www.youtube.com\/embed\/' . $videoUrl }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-12 modules_area">
                    <div class="modile_main_wrap">
                        <a href="javascript:void(0)">
                            <div class="single_module text-center">
                                <div class="icon">
                                    <img src="{{ asset($homeContent->how_to_buy_logo1) }}" alt=""
                                        style="max-width: 100%">
                                </div>
                                <h3>
                                    {{ @$homeContent->how_to_buy_title1 }}
                                </h3>
                                <p>{{ @$homeContent->how_to_buy_details1 }}</p>
                            </div>
                        </a>

                        <a href="javascript:void(0)">
                            <div class="single_module text-center">
                                <div class="icon">
                                    <img src="{{ asset($homeContent->how_to_buy_logo2) }}" alt=""
                                        style="max-width: 100%">
                                </div>
                                <h3>
                                    {{ @$homeContent->how_to_buy_title2 }}
                                </h3>
                                <p>{{ @$homeContent->how_to_buy_details2 }}</p>
                            </div>
                        </a>


                        <a href="javascript:void(0)">
                            <div class="single_module text-center">
                                <div class="icon">
                                    <img src="{{ asset($homeContent->how_to_buy_logo3) }}" alt=""
                                        style="max-width: 100%">
                                </div>
                                <h3>
                                    {{ @$homeContent->how_to_buy_title3 }}
                                </h3>
                                <p>{{ @$homeContent->how_to_buy_details3 }}</p>
                            </div>
                        </a>

                        <a href="javascript:void(0)">
                            <div class="single_module text-center">
                                <div class="icon">
                                    <img src="{{ asset($homeContent->how_to_buy_logo4) }}" alt=""
                                        style="max-width: 100%">
                                </div>
                                <h3>
                                    {{ @$homeContent->how_to_buy_title4 }}
                                </h3>
                                <p>{{ @$homeContent->how_to_buy_details4 }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div>
            @if (isset($top_courses))
                @foreach ($top_courses as $course)
                    @if ($course->future_course == 0)
                        @if ($course->id % 2 != 0)
                            <div class="course_even row thumb_inner lazy"
                                data-src="{{ $course->course_background_image }}">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div>
                                        <div class="course_content mb-4">
                                            <div class="course_icon_container">
                                                <img class="course_icon" src="{{ $course->course_icon }}"
                                                    alt="">
                                            </div>
                                            <div class="course_title_container">
                                                <a
                                                    href="{{ courseDetailsUrl(@$course->id, @$course->type, @$course->slug) }}">

                                                    <h2 class="text-white" title=" {{ $course->title }}">
                                                        {{ $course->title }}
                                                    </h2>
                                                </a>
                                            </div>
                                            @if (!is_null(json_decode($course->course_feature, true)) && count(json_decode($course->course_feature, true)))
                                                <div>
                                                    @foreach (json_decode($course->course_feature, true) as $course_feature)
                                                        <span class="row pl-3 text-white"
                                                            style="margin-bottom: 0.2rem"><i
                                                                class="ti-check font-weight-bold pt-1 pr-2"></i>
                                                            <h5 class="text-white">{{ $course_feature }}</h5>
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div>
                                        <img class="course_tumbnail" src="{{ $course->image }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="course_odd row">
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                                    <div>
                                        <img class="course_tumbnail" src="{{ $course->image }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div>
                                        <div class="course_content pl-md-4">
                                            <div class="course_icon_container">
                                                <img class="course_icon" src="{{ $course->course_icon }}"
                                                    alt="">
                                            </div>

                                            <div class="course_title_container">
                                                <a
                                                    href="{{ courseDetailsUrl(@$course->id, @$course->type, @$course->slug) }}">

                                                    <h2 title="{{ $course->title }}">
                                                        {{ $course->title }}
                                                    </h2>
                                                </a>
                                            </div>

                                            @if (!is_null(json_decode($course->course_feature, true)) && count(json_decode($course->course_feature, true)))
                                                <div>
                                                    @foreach (json_decode($course->course_feature, true) as $course_feature)
                                                        <span class="row pl-3" style="margin-bottom: 0.2rem"><i
                                                                class="ti-check font-weight-bold pt-1 pr-2"></i>
                                                            <h5>{{ $course_feature }}</h5>
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif

        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="section__title mb_40">
                        <h3 class="text-center">
                            {{ @$homeContent->category_title }}
                        </h3>
                        <p class="text-center">
                            {{ @$homeContent->category_sub_title }}
                        </p>

                        <a href="{{ route('courses') }}" class="line_link">{{ __('frontend.View All Courses') }}</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            @if (isset($categories))
                                @foreach ($categories as $key => $category)
                                    @if ($key == 0)
                                        <div class="category_wiz mb_30">
                                            <div class="thumb cat1"
                                                style="background-image: url('{{ asset($category->thumbnail) }}')">
                                                <a href="{{ route('courses') }}?category={{ $category->id }}"
                                                    class="cat_btn">{{ $category->name }}</a>
                                            </div>
                                        </div>
                                        <a href="{{ route('courses') }}" class="brouse_cat_btn ">
                                            {{ __('frontend.Browse all of other categories') }}
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6">
                            @if (isset($categories))
                                @foreach ($categories as $key => $category)
                                    @if ($key == 1)
                                        <div class="category_wiz mb_30">
                                            <div class="thumb cat2"
                                                style="background-image: url('{{ asset($category->thumbnail) }}')">
                                                <a href="{{ route('courses') }}?category={{ $category->id }}"
                                                    class="cat_btn">{{ $category->name }} hello</a>
                                            </div>
                                        </div>
                                    @elseif($key == 2)
                                        <div class="category_wiz mb_30">
                                            <div class="thumb  cat3"
                                                style="background-image: url('{{ asset($category->thumbnail) }}')">
                                                <a href="{{ route('courses') }}?category={{ $category->id }}"
                                                    class="cat_btn">{{ $category->name }}</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


</div>
