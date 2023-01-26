@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('common.About') }}
@endsection
@section('css')
    <style>
        .who_we_area .who_we_info .info_left span {
            font-size: 1.2rem;
        }

        .who_we_area .who_we_info .info_right {
            padding: 0;
        }

        .who_we_are {
            border: 1px solid #e9e7f7;
            padding: 57px 80px 67px 50px;
            border-radius: 5px 0 0 5px;
        }

        .who_we_are span {
            font-family: Jost, sans-serif;
            font-size: 1.2rem;
            font-weight: 600;
            color: #373737;
            display: inline-block;
            margin-bottom: 21px;
        }

        .who_we_are p {
            font-family: Cerebri Sans;
            font-size: 24px;
            line-height: 35px;
            font-weight: 700;
            color: var(--system_secendory_color);
        }
    </style>
@endsection
@section('js')
@endsection

@section('mainContent')
    <x-breadcrumb :banner="$frontendContent->about_page_banner" :title="$frontendContent->about_page_title" :subTitle="$frontendContent->about_page_title" />

    <x-about-page-who-we-are :about="$about" />

    <div class="container">
        <div class="row align-items-center">
            @if (isset($about->about_video_url) && isset($about->about_video_url_status) && $about->about_video_url_status)
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-sm-8 mx-auto mb-5">
                            @php
                                $videoUrl = explode('=', $about->about_video_url);
                                $videoUrl = isset($videoUrl[1]) ? $videoUrl[1] : '';
                            @endphp
                            <iframe width="100%" height="500" src="{{ 'https:\/\/www.youtube.com\/embed\/' . $videoUrl }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <x-about-page-gallery :about="$about" />

    <x-about-page-counter :about="$about" />

    @if ($about->show_testimonial)
        <x-about-page-testimonial :frontendContent="$frontendContent" />
    @endif
    @if ($about->show_brand)
        <x-about-page-brand />
    @endif
    @if ($about->show_become_instructor)
        <x-about-page-become-instructor :frontendContent="$frontendContent" />
    @endif
@endsection
