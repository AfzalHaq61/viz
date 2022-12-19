<div>

    <div class="category_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    @if(isset($homeContent))
                        @if($homeContent->show_key_feature==1)

                            <div class="couses_category">
                                <div class="row">
                                    <div class="col-xl-4 col-md-4">
                                        <div class="single_course_cat">
                                            <div class="icon">
                                                @if(!empty($homeContent->key_feature_logo1))
                                                    <img
                                                        src="{{asset($homeContent->key_feature_logo1)}}"
                                                        alt="">
                                                @endif
                                            </div>
                                            <div class="course_content">
                                                <h4>
                                                    @if(!empty($homeContent->feature_link1))<a
                                                        href="{{$homeContent->feature_link1}}"> @endif
                                                        {{$homeContent->key_feature_title1}}
                                                        @if(!empty($homeContent->feature_link1))   </a> @endif
                                                </h4>
                                                <p>{{$homeContent->key_feature_subtitle1}} </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-md-4">
                                        <div class="single_course_cat">
                                            <div class="icon">
                                                @if(!empty($homeContent->key_feature_logo2))
                                                    <img
                                                        src="{{asset($homeContent->key_feature_logo2)}}"
                                                        alt="">
                                                @endif
                                            </div>
                                            <div class="course_content">
                                                <h4>
                                                    @if(!empty($homeContent->feature_link2))<a
                                                        href="{{$homeContent->feature_link2}}"> @endif
                                                        {{$homeContent->key_feature_title2}}
                                                        @if(!empty($homeContent->feature_link2))   </a> @endif
                                                </h4>
                                                <p>{{$homeContent->key_feature_subtitle2}} </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-md-4">
                                        <div class="single_course_cat">
                                            <div class="icon">
                                                @if(!empty($homeContent->key_feature_logo3))
                                                    <img
                                                        src="{{asset($homeContent->key_feature_logo3)}}"
                                                        alt="">
                                                @endif
                                            </div>
                                            <div class="course_content">
                                                <h4>
                                                    @if(!empty($homeContent->feature_link3))<a
                                                        href="{{$homeContent->feature_link3}}"> @endif
                                                        {{$homeContent->key_feature_title3}}
                                                        @if(!empty($homeContent->feature_link3))   </a> @endif
                                                </h4>
                                                <p>{{$homeContent->key_feature_subtitle3}} </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endif

                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-sm-8 mx-auto mb-5">
                            <iframe width="100%" height="500" src="https://www.youtube.com/embed/A1yoIlVlpHM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-12 modules_area">
                        <div class="modile_main_wrap">
                            <a href="javascript:void(0)">
                                <div class="single_module text-center">
                                    <div class="icon">
                                        <img src="{{asset($homeContent->how_to_buy_logo1)}}" alt="" style="max-width: 100%">
                                    </div>
                                    <h3>
                                        {{@$homeContent->how_to_buy_title1}}
                                    </h3>
                                    <p>{{@$homeContent->how_to_buy_details1}}</p>
                                </div>
                            </a>


                            <a href="javascript:void(0)">
                                <div class="single_module text-center">
                                    <div class="icon">
                                        <img src="{{asset($homeContent->how_to_buy_logo2)}}" alt="" style="max-width: 100%">
                                    </div>
                                    <h3>
                                        {{@$homeContent->how_to_buy_title2}}
                                    </h3>
                                    <p>{{@$homeContent->how_to_buy_details2}}</p>
                                </div>
                            </a>


                            <a href="javascript:void(0)">
                                <div class="single_module text-center">
                                    <div class="icon">
                                        <img src="{{asset($homeContent->how_to_buy_logo3)}}" alt="" style="max-width: 100%">
                                    </div>
                                    <h3>
                                        {{@$homeContent->how_to_buy_title3}}
                                    </h3>
                                    <p>{{@$homeContent->how_to_buy_details3}}</p>
                                </div>
                            </a>

                            <a href="javascript:void(0)">
                                <div class="single_module text-center">
                                    <div class="icon">
                                        <img src="{{asset($homeContent->how_to_buy_logo4)}}" alt=""
                                             style="max-width: 100%">
                                    </div>
                                    <h3>
                                        {{@$homeContent->how_to_buy_title4}}
                                    </h3>
                                    <p>{{@$homeContent->how_to_buy_details4}}</p>
                                </div>
                            </a>
                        </div>
                </div>


                <div class="col-12">
                    <div class="section__title mb_40">
                        <h3 class="text-center">
                            {{@$homeContent->category_title}}
                        </h3>
                        <p class="text-center">
                            {{@$homeContent->category_sub_title}}
                        </p>

                        <a href="{{route('courses')}}"
                           class="line_link">{{__('frontend.View All Courses')}}</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            @if(isset($categories ))
                                @foreach ($categories  as $key=>$category)
                                    @if($key==0)
                                        <div class="category_wiz mb_30">
                                            <div class="thumb cat1"
                                                 style="background-image: url('{{asset($category->thumbnail)}}')">
                                                <a href="{{route('courses')}}?category={{$category->id}}"
                                                   class="cat_btn">{{$category->name}}</a>
                                            </div>
                                        </div>
                                        <a href="{{route('courses')}}"
                                           class="brouse_cat_btn ">
                                            {{__('frontend.Browse all of other categories')}}
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6">
                            @if(isset($categories ))
                                @foreach ($categories  as $key=>$category)

                                    @if($key==1)
                                        <div class="category_wiz mb_30">
                                            <div class="thumb cat2"
                                                 style="background-image: url('{{asset($category->thumbnail)}}')">
                                                <a href="{{route('courses')}}?category={{$category->id}}"
                                                   class="cat_btn">{{$category->name}} hello</a>
                                            </div>
                                        </div>
                                    @elseif($key==2)
                                        <div class="category_wiz mb_30">
                                            <div class="thumb  cat3"
                                                 style="background-image: url('{{asset($category->thumbnail)}}')">
                                                <a href="{{route('courses')}}?category={{$category->id}}"
                                                   class="cat_btn">{{$category->name}}</a>
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