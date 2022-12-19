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
                                            <h4 class="mb-0">{{$page->title}}</h4>
                                        </div>
                                        <div class="address_lines py-3">
                                            {!! $page->details !!}
                                        </div>
                                    </div>

                                    {{-- FUTURE COURSES --}}

                                    @if($futureCourses)
                                        <div class="col-12">
                                            <div class="row mb-5">
                                            @foreach ($futureCourses as $futureCourse)
                                            <div class="col-lg-6 col-xl-4">
                                                <div class="couse_wizged">
                                                    <div class="thumb">
                                                        <div class="thumb_inner lazy"
                                                            data-src="{{ asset("public/future-courses/$futureCourse->image") }}">
                                                        </div>
                                                    </div>
                                                    <div class="course_content">
                                                            <h4 class="noBrake" title=" {{$futureCourse->title}}">
                                                                {{$futureCourse->title}}
                                                            </h4>
                                                    </div>
                                                </div>
                                            </div>
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
