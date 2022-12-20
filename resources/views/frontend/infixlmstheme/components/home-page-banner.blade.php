<!-- @section('css')
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
        width: 500px;
        height: 500px;
    }
</style>
@endsection

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
                    <div class="course_title_container">
                        <a href="{{courseDetailsUrl(@$course->id,@$course->type,@$course->slug)}}">

                            <h2 class="noBrake text-white" title=" {{$course->title}}">
                                {{$course->title}}
                            </h2>
                        </a>
                    </div>
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

</div> -->

<div>
    @if($homeContent->show_banner_section==1)
    <form action="{{route('search')}}">
        <div class="banner_area" @if(isset($homeContent->slider_banner) && !empty($homeContent->slider_banner))
            style="background-image: url('{{asset(@$homeContent->slider_banner)}}')"
            @endif>
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-9 offset-lg-1">
                        <div class="banner_text">
                            <h3>{{@$homeContent->slider_title}}</h3>
                            <p>{{@$homeContent->slider_text}}</p>
                            @if(@$homeContent->show_banner_search_box==1)
                            <div class="input-group theme_search_field large_search_field">
                                <div class="input-group-prepend">
                                    <button class="btn" type="button" id="button-addon2"><i class="ti-search"></i>
                                    </button>
                                </div>
                                <input type="text" name="query" class="form-control" placeholder="{{__('frontend.Search for course, skills and Videos')}}">
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @else
    <div class="owl-carousel" id="bannerSlider">
        @if($sliders)
        @foreach($sliders as $key=>$slider)
        <div class="banner_area" style="background-image: url({{asset(@$slider->image)}})">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-9 offset-lg-1">
                        <div class="banner_text">
                            <h3>{{@$slider->title}}</h3>
                            <p>{{@$slider->sub_title}}</p>
                            <div class="row d-flex align-items-center">
                                @if($slider->btn_type1==1)
                                @if(!empty($slider->btn_title1))
                                <div class="single_slider">
                                    <a href="{{$slider->btn_link1}}" class="slider_btn_text text-center">{{$slider->btn_title1}}</a>
                                </div>
                                @endif
                                @else
                                <div class="single_slider">
                                    <a href="{{$slider->btn_link1}}">
                                        <img src="{{asset($slider->btn_image1)}}" alt="">
                                    </a>
                                </div>
                                @endif
                                @if($slider->btn_type2==1)
                                @if(!empty($slider->btn_title2))
                                <div class="single_slider">
                                    <a href="{{$slider->btn_link2}}" class="slider_btn_text text-center">{{$slider->btn_title2}}</a>
                                </div>
                                @endif
                                @else
                                <div class="single_slider">
                                    <a href="{{$slider->btn_link2}}">
                                        <img src="{{asset($slider->btn_image2)}}" alt="">
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    @endif
</div>