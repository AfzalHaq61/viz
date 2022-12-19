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

</div>