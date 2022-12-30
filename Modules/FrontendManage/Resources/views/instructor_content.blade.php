@extends('backend.master')
@section('table')
    {{ __('testimonials') }}
@endsection
@push('styles')
    <link href="{{ asset('public/backend/vendors/nestable/jquery.nestable.min.css') }}" rel="stylesheet">
    <style>
        .row>.accordion {
            max-width: 100% !important;
            flex: 0 0 100% !important;
        }

        .row .accordion .card .card-header {
            padding: 5px 5px;
            background-color: rgba(237, 239, 245, 0.35);
        }

        .row .accordion .card .card-header::before {
            content: "\e656";
            font-family: 'themify';
            font-weight: 500;
            line-height: 1.5;
            font-size: 14px;
            color: #00124E;
            position: absolute;
            top: 13px;
            right: 25px;
        }

        .card-header button[aria-expanded]::before {
            font-family: 'themify';
            font-weight: 500;
            line-height: 1.5;
            font-size: 14px;
            color: #00124E;
            position: absolute;
            right: 55px;
            top: 13px;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
        }

        .card-header button[aria-expanded=false]::before {
            content: "\e64b";
        }

        .card-header button[aria-expanded=true]::before {
            content: "\e648";
        }
    </style>
@endpush
@section('mainContent')
    @include('backend.partials.alertMessage')
    @php
        $currentTheme = currentTheme();
        $LanguageList = getLanguageList();
    @endphp
    <section class="sms-breadcrumb mb-20 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1>{{ __('frontendmanage.Home Content') }}</h1>
                <div class="bc-pages">
                    <a href="{{ route('dashboard') }}">{{ __('common.Dashboard') }}</a>
                    <a href="#">{{ __('frontendmanage.Frontend CMS') }}</a>
                    <a class="active" href="{{ url('frontend/home-content') }}">{{ __('frontendmanage.Home Content') }}</a>
                </div>
            </div>
        </div>
    </section>
    <section class=" student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-15">
                    <a target="_blank" href="{{ url('/') }}" class="primary-btn small fix-gr-bg"> <span
                            class="ti-eye pr-2"></span> {{ __('student.Preview') }} </a>
                </div>
                <div class="col-lg-12">
                    <form class="form-horizontal" action="{{ route('frontend.instructor_update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="white-box  student-details header-menu">
                            <div class="col-md-12 ">
                                <input type="hidden" name="url" id="url" value="{{ URL::to('/') }}">
                                <div class="row mb-30">
                                    <div class="col-md-12 item_list">

                                        @php
                                            if (Settings('frontend_active_theme') == 'tvt') {
                                                $ids = [1, 3, 18, 19, 20, 21];
                                                $blocks = $blocks->whereIn('id', $ids);
                                            }
                                        @endphp

                                        @foreach ($blocks as $block)
                                            @if ($block->id == 2)
                                                @if ($currentTheme != 'teachery')
                                                    <div data-id="{{ $block->id }}" class="row">
                                                        <div class="accordion" id="accordionHomeContent">
                                                            <div class="card">
                                                                <div class="card-header" id="heading{{ $block->id }}">
                                                                    <h2 class="mb-0">
                                                                        <button class="btn btn-block text-left"
                                                                            type="button" data-toggle="collapse"
                                                                            data-target="#collapse{{ $block->id }}"
                                                                            aria-expanded="true"
                                                                            aria-controls="collapse{{ $block->id }}">
                                                                            {{ __('frontendmanage.Populer Section Show in Instructor Page') }}

                                                                            <small class="text-danger">
                                                                                @if (@getRawHomeContents($home_content, 'show_key_feature', 'en') == 1 &&
                                                                                    @getRawHomeContents($home_content, 'show_category_section', 'en') != 1)
                                                                                    ({{ __('frontendmanage.Category Section Show In Homepage') }}
                                                                                    {{ __('frontend.is required') }})
                                                                                @endif
                                                                            </small>
                                                                        </button>
                                                                    </h2>
                                                                </div>

                                                                <div id="collapse{{ $block->id }}" class="collapse show"
                                                                    aria-labelledby="heading{{ $block->id }}"
                                                                    data-parent="#accordionHomeContent">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-xl-12 ">
                                                                                {{-- <div class="mb_25">
                                                                                    <label class="switch_toggle "
                                                                                        for="show_instructor_populer_section">
                                                                                        <input type="checkbox"
                                                                                            class="status_enable_disable"
                                                                                            name="show_instructor_populer_section"
                                                                                            id="show_instructor_populer_section"
                                                                                            @if (@getRawHomeContents($home_content, 'show_instructor_populer_section', 'en') == 1) checked @endif
                                                                                            value="1">
                                                                                        <i class="slider round"></i>


                                                                                    </label>
                                                                                    {{ __('frontendmanage.Populer Section Show in Instructor Page') }}

                                                                                </div> --}}
                                                                                <div id="show_category_section_box"
                                                                                    class="col-md-12"
                                                                                    style="@if (@getRawHomeContents($home_content, 'show_category_section', 'en') == 0) display:none @endif ">
                                                                                    <div class="row pt-0">
                                                                                        @if (isModuleActive('FrontendMultiLang'))
                                                                                            <ul class="nav nav-tabs no-bottom-border  mt-sm-md-20 mb-10 ml-3"
                                                                                                role="tablist">
                                                                                                @foreach ($LanguageList as $key => $language)
                                                                                                    <li class="nav-item">
                                                                                                        <a class="nav-link  @if (auth()->user()->language_code == $language->code) active @endif"
                                                                                                            href="#elementblock3{{ $language->code }}"
                                                                                                            role="tab"
                                                                                                            data-toggle="tab">{{ $language->native }}
                                                                                                        </a>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="tab-content">
                                                                                        @foreach ($LanguageList as $key => $language)
                                                                                            <div role="tabpanel"
                                                                                                class="tab-pane fade @if (auth()->user()->language_code == $language->code) show active @endif  "
                                                                                                id="elementblock3{{ $language->code }}">
                                                                                                <div class="row">
                                                                                                    <div class="col-xl-12">
                                                                                                        <div
                                                                                                            class="primary_input mb-25">
                                                                                                            <label
                                                                                                                class="primary_input_label"
                                                                                                                for="">{{ __('frontendmanage.Instructor Testemonial Title') }}
                                                                                                            </label>
                                                                                                            <input
                                                                                                                class="primary_input_field"
                                                                                                                placeholder="{{ __('frontendmanage.Instructor Testemonial Title') }}"
                                                                                                                type="text"
                                                                                                                name="instructor_testemonials_title[{{ $language->code }}]"
                                                                                                                {{ $errors->has('instructor_testemonials_title') ? ' autofocus' : '' }}
                                                                                                                value="{{ isset($home_content) ? getRawHomeContents($home_content, 'instructor_testemonials_title', $language->code) : '' }}">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-xl-12">
                                                                                                        <div
                                                                                                            class="primary_input mb-25">
                                                                                                            <label
                                                                                                                class="primary_input_label"
                                                                                                                for="">{{ __('frontendmanage.Instructor Testemonial Subtitle') }}
                                                                                                            </label>
                                                                                                            <input
                                                                                                                class="primary_input_field"
                                                                                                                placeholder="{{ __('frontendmanage.Instructor Testemonial Subtitle') }}"
                                                                                                                type="text"
                                                                                                                name="instructor_testemonials_subtitle[{{ $language->code }}]"
                                                                                                                {{ $errors->has('instructor_testemonials_subtitle') ? ' autofocus' : '' }}
                                                                                                                value="{{ isset($home_content) ? getRawHomeContents($home_content, 'instructor_testemonials_subtitle', $language->code) : '' }}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-12">
                                                                            <div class="modal fade admin-query"
                                                                                id="keyFeature1">
                                                                                <div
                                                                                    class="modal-dialog modal-dialog-centered">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h4 class="modal-title">
                                                                                                {{ __('frontendmanage.Change Key Feature') }}
                                                                                                1 </h4>
                                                                                            <button type="button"
                                                                                                class="close"
                                                                                                data-dismiss="modal">
                                                                                                <i class="ti-close "></i>
                                                                                            </button>
                                                                                        </div>

                                                                                        <div
                                                                                            class="modal-body student-details header-menu">
                                                                                            <div class="row pt-0">
                                                                                                @if (isModuleActive('FrontendMultiLang'))
                                                                                                    <ul class="nav nav-tabs no-bottom-border  mt-sm-md-20 mb-10 ml-3"
                                                                                                        role="tablist">
                                                                                                        @foreach ($LanguageList as $key => $language)
                                                                                                            <li
                                                                                                                class="nav-item">
                                                                                                                <a class="nav-link  @if (auth()->user()->language_code == $language->code) active @endif"
                                                                                                                    href="#elementkey1{{ $language->code }}"
                                                                                                                    role="tab"
                                                                                                                    data-toggle="tab">{{ $language->native }}
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="tab-content">
                                                                                                @foreach ($LanguageList as $key => $language)
                                                                                                    <div role="tabpanel"
                                                                                                        class="tab-pane fade @if (auth()->user()->language_code == $language->code) show active @endif  "
                                                                                                        id="elementkey1{{ $language->code }}">
                                                                                                        <div
                                                                                                            class="row">
                                                                                                            <div
                                                                                                                class="col-xl-12">
                                                                                                                <div
                                                                                                                    class="primary_input mb-25">
                                                                                                                    <label
                                                                                                                        class="primary_input_label"
                                                                                                                        for="">{{ __('common.Title') }}</label>
                                                                                                                    <input
                                                                                                                        class="primary_input_field"
                                                                                                                        placeholder=""
                                                                                                                        type="text"
                                                                                                                        name="key_feature_title1[{{ $language->code }}]"
                                                                                                                        {{ $errors->has('key_feature_title1') ? ' autofocus' : '' }}
                                                                                                                        value="{{ isset($home_content) ? getRawHomeContents($home_content, 'key_feature_title1', $language->code) : '' }}">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            @if ($currentTheme != 'Edume')
                                                                                                                <div
                                                                                                                    class="col-xl-12">
                                                                                                                    <div
                                                                                                                        class="primary_input mb-25">
                                                                                                                        <label
                                                                                                                            class="primary_input_label"
                                                                                                                            for="">
                                                                                                                            {{ __('frontendmanage.Change') }}
                                                                                                                            {{ __('frontendmanage.Key Feature Subtitle') }}
                                                                                                                        </label>
                                                                                                                        <input
                                                                                                                            class="primary_input_field"
                                                                                                                            placeholder=""
                                                                                                                            type="text"
                                                                                                                            name="key_feature_subtitle1[{{ $language->code }}]"
                                                                                                                            {{ $errors->has('key_feature_subtitle1') ? ' autofocus' : '' }}
                                                                                                                            value="{{ isset($home_content) ? getRawHomeContents($home_content, 'key_feature_subtitle1', $language->code) : '' }}">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endforeach
                                                                                            </div>

                                                                                            <div class="col-xl-12">
                                                                                                <div
                                                                                                    class="primary_input mb-25">
                                                                                                    <label
                                                                                                        class="primary_input_label"
                                                                                                        for="">{{ __('frontendmanage.Page Link') }}</label>

                                                                                                    <select
                                                                                                        class="primary_select   "
                                                                                                        name="key_feature_link1"
                                                                                                        {{ $errors->has('host') ? 'autofocus' : '' }}
                                                                                                        id="">
                                                                                                        <option
                                                                                                            data-display="{{ __('common.Select') }} {{ __('frontendmanage.Page Link') }}"
                                                                                                            value="">
                                                                                                            {{ __('common.Select') }}
                                                                                                            {{ __('frontendmanage.Page Link') }}

                                                                                                        </option>
                                                                                                        @foreach ($pages as $page)
                                                                                                            <option
                                                                                                                @if (getRawHomeContents($home_content, 'key_feature_link1', 'en') == $page->id) selected @endif
                                                                                                                value="{{ $page->id }}">

                                                                                                                {{ $page->title }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                    </select>

                                                                                                </div>
                                                                                            </div>


                                                                                            <div class="col-xl-12 mt-3">
                                                                                                <div
                                                                                                    class="primary_input mt_25 mb-25">
                                                                                                    <label
                                                                                                        class="primary_input_label"
                                                                                                        for="">{{ __('frontendmanage.Key Feature Icon') }}
                                                                                                        1
                                                                                                    </label>
                                                                                                    <small>
                                                                                                        {{ __('courses.Recommended Size') }}
                                                                                                        50x50 px
                                                                                                    </small>
                                                                                                    <div
                                                                                                        class="primary_file_uploader">
                                                                                                        <input
                                                                                                            class="primary-input  filePlaceholder "
                                                                                                            type="text"
                                                                                                            id=""
                                                                                                            placeholder="Browse file"
                                                                                                            readonly="">
                                                                                                        <button
                                                                                                            class=""
                                                                                                            type="button">
                                                                                                            <label
                                                                                                                class="primary-btn small fix-gr-bg"
                                                                                                                for="file6">{{ __('common.Browse') }}</label>
                                                                                                            <input
                                                                                                                type="file"
                                                                                                                class="d-none fileUpload imgInput6"
                                                                                                                name="key_feature_logo1"
                                                                                                                id="file6">
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-xl-12">
                                                                                                <div
                                                                                                    class="primary_input mt_25 mb-25">
                                                                                                    <img class=" imagePreview6"
                                                                                                        style="max-width: 100%"
                                                                                                        src="{{ asset('/' . getRawHomeContents($home_content, 'key_feature_logo1', 'en')) }}"
                                                                                                        alt="">
                                                                                                </div>
                                                                                            </div>


                                                                                            <div
                                                                                                class="mt-40 d-flex justify-content-between">
                                                                                                <button type="button"
                                                                                                    class="primary-btn tr-bg"
                                                                                                    data-dismiss="modal">{{ __('common.Cancel') }}</button>

                                                                                                <button
                                                                                                    class="primary-btn fix-gr-bg"
                                                                                                    type="submit">{{ __('common.Submit') }}
                                                                                                </button>

                                                                                            </div>

                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="modal fade admin-query"
                                                                                id="keyFeature2">
                                                                                <div
                                                                                    class="modal-dialog modal-dialog-centered">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h4 class="modal-title">
                                                                                                {{ __('frontendmanage.Change Key Feature') }}
                                                                                                2 </h4>
                                                                                            <button type="button"
                                                                                                class="close"
                                                                                                data-dismiss="modal">
                                                                                                <i class="ti-close "></i>
                                                                                            </button>
                                                                                        </div>

                                                                                        <div class="modal-body">

                                                                                            <div class="row pt-0">
                                                                                                @if (isModuleActive('FrontendMultiLang'))
                                                                                                    <ul class="nav nav-tabs no-bottom-border  mt-sm-md-20 mb-10 ml-3"
                                                                                                        role="tablist">
                                                                                                        @foreach ($LanguageList as $key => $language)
                                                                                                            <li
                                                                                                                class="nav-item">
                                                                                                                <a class="nav-link  @if (auth()->user()->language_code == $language->code) active @endif"
                                                                                                                    href="#elementkey2{{ $language->code }}"
                                                                                                                    role="tab"
                                                                                                                    data-toggle="tab">{{ $language->native }}
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="tab-content">
                                                                                                @foreach ($LanguageList as $key => $language)
                                                                                                    <div role="tabpanel"
                                                                                                        class="tab-pane fade @if (auth()->user()->language_code == $language->code) show active @endif  "
                                                                                                        id="elementkey2{{ $language->code }}">
                                                                                                        <div
                                                                                                            class="row">
                                                                                                            <div
                                                                                                                class="col-xl-12">
                                                                                                                <div
                                                                                                                    class="primary_input mb-25">
                                                                                                                    <label
                                                                                                                        class="primary_input_label"
                                                                                                                        for="">{{ __('common.Title') }}</label>
                                                                                                                    <input
                                                                                                                        class="primary_input_field"
                                                                                                                        placeholder=""
                                                                                                                        type="text"
                                                                                                                        name="key_feature_title2[{{ $language->code }}]"
                                                                                                                        {{ $errors->has('key_feature_title2') ? ' autofocus' : '' }}
                                                                                                                        value="{{ isset($home_content) ? getRawHomeContents($home_content, 'key_feature_title2', $language->code) : '' }}">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            @if ($currentTheme != 'Edume')
                                                                                                                <div
                                                                                                                    class="col-xl-12">
                                                                                                                    <div
                                                                                                                        class="primary_input mb-25">
                                                                                                                        <label
                                                                                                                            class="primary_input_label"
                                                                                                                            for="">
                                                                                                                            {{ __('frontendmanage.Change') }}
                                                                                                                            {{ __('frontendmanage.Key Feature Subtitle') }}
                                                                                                                        </label>
                                                                                                                        <input
                                                                                                                            class="primary_input_field"
                                                                                                                            placeholder=""
                                                                                                                            type="text"
                                                                                                                            name="key_feature_subtitle2[{{ $language->code }}]"
                                                                                                                            {{ $errors->has('key_feature_subtitle1') ? ' autofocus' : '' }}
                                                                                                                            value="{{ isset($home_content) ? getRawHomeContents($home_content, 'key_feature_subtitle2', $language->code) : '' }}">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endforeach
                                                                                            </div>
                                                                                            <div class="col-xl-12">
                                                                                                <div
                                                                                                    class="primary_input mb-25">
                                                                                                    <label
                                                                                                        class="primary_input_label"
                                                                                                        for="">{{ __('frontendmanage.Page Link') }}</label>

                                                                                                    <select
                                                                                                        class="primary_select   "
                                                                                                        name="key_feature_link2"
                                                                                                        {{ $errors->has('host') ? 'autofocus' : '' }}
                                                                                                        id="">
                                                                                                        <option
                                                                                                            data-display="{{ __('common.Select') }} {{ __('frontendmanage.Page Link') }}"
                                                                                                            value="">
                                                                                                            {{ __('common.Select') }}
                                                                                                            {{ __('frontendmanage.Page Link') }}

                                                                                                        </option>
                                                                                                        @foreach ($pages as $page)
                                                                                                            <option
                                                                                                                @if (getRawHomeContents($home_content, 'key_feature_link2', 'en') == $page->id) selected @endif
                                                                                                                value="{{ $page->id }}">
                                                                                                                {{ $page->title }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                    </select>

                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-xl-12">
                                                                                                <div
                                                                                                    class="primary_input mt_25 mb-25">
                                                                                                    <label
                                                                                                        class="primary_input_label"
                                                                                                        for="">{{ __('frontendmanage.Key Feature Icon') }}
                                                                                                        2
                                                                                                    </label>
                                                                                                    <small>
                                                                                                        {{ __('courses.Recommended Size') }}
                                                                                                        50x50 px
                                                                                                    </small>
                                                                                                    <div
                                                                                                        class="primary_file_uploader">
                                                                                                        <input
                                                                                                            class="primary-input  filePlaceholder"
                                                                                                            type="text"
                                                                                                            id=""
                                                                                                            placeholder="Browse file"
                                                                                                            readonly="">
                                                                                                        <button
                                                                                                            class=""
                                                                                                            type="button">
                                                                                                            <label
                                                                                                                class="primary-btn small fix-gr-bg"
                                                                                                                for="file7">{{ __('common.Browse') }}</label>
                                                                                                            <input
                                                                                                                type="file"
                                                                                                                class="d-none fileUpload imgInput7"
                                                                                                                name="key_feature_logo2"
                                                                                                                id="file7">
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xl-12">
                                                                                                <div
                                                                                                    class="primary_input mt_25 mb-25">
                                                                                                    <img class=" imagePreview7"
                                                                                                        style="max-width: 100%"
                                                                                                        src="{{ asset('/' . getRawHomeContents($home_content, 'key_feature_logo2', 'en')) }}"
                                                                                                        alt="">
                                                                                                </div>
                                                                                            </div>


                                                                                            <div
                                                                                                class="mt-40 d-flex justify-content-between">
                                                                                                <button type="button"
                                                                                                    class="primary-btn tr-bg"
                                                                                                    data-dismiss="modal">{{ __('common.Cancel') }}</button>

                                                                                                <button
                                                                                                    class="primary-btn fix-gr-bg"
                                                                                                    type="submit">{{ __('common.Submit') }}
                                                                                                </button>

                                                                                            </div>

                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="modal fade admin-query"
                                                                                id="keyFeature3">
                                                                                <div
                                                                                    class="modal-dialog modal-dialog-centered">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h4 class="modal-title">
                                                                                                {{ __('frontendmanage.Change Key Feature') }}
                                                                                                3 </h4>
                                                                                            <button type="button"
                                                                                                class="close"
                                                                                                data-dismiss="modal">
                                                                                                <i class="ti-close "></i>
                                                                                            </button>
                                                                                        </div>

                                                                                        <div class="modal-body">
                                                                                            <div class="row pt-0">
                                                                                                @if (isModuleActive('FrontendMultiLang'))
                                                                                                    <ul class="nav nav-tabs no-bottom-border  mt-sm-md-20 mb-10 ml-3"
                                                                                                        role="tablist">
                                                                                                        @foreach ($LanguageList as $key => $language)
                                                                                                            <li
                                                                                                                class="nav-item">
                                                                                                                <a class="nav-link  @if (auth()->user()->language_code == $language->code) active @endif"
                                                                                                                    href="#element{{ $language->code }}"
                                                                                                                    role="tab"
                                                                                                                    data-toggle="tab">{{ $language->native }}
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="tab-content">
                                                                                                @foreach ($LanguageList as $key => $language)
                                                                                                    <div role="tabpanel"
                                                                                                        class="tab-pane fade @if (auth()->user()->language_code == $language->code) show active @endif  "
                                                                                                        id="element{{ $language->code }}">
                                                                                                        <div
                                                                                                            class="row">
                                                                                                            <div
                                                                                                                class="col-xl-12">
                                                                                                                <div
                                                                                                                    class="primary_input mb-25">
                                                                                                                    <label
                                                                                                                        class="primary_input_label"
                                                                                                                        for="">{{ __('common.Title') }}</label>
                                                                                                                    <input
                                                                                                                        class="primary_input_field"
                                                                                                                        placeholder=""
                                                                                                                        type="text"
                                                                                                                        name="key_feature_title3[{{ $language->code }}]"
                                                                                                                        {{ $errors->has('key_feature_title3') ? ' autofocus' : '' }}
                                                                                                                        value="{{ isset($home_content) ? getRawHomeContents($home_content, 'key_feature_title3', $language->code) : '' }}">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            @if ($currentTheme != 'Edume')
                                                                                                                <div
                                                                                                                    class="col-xl-12">
                                                                                                                    <div
                                                                                                                        class="primary_input mb-25">
                                                                                                                        <label
                                                                                                                            class="primary_input_label"
                                                                                                                            for="">
                                                                                                                            {{ __('frontendmanage.Change') }}
                                                                                                                            {{ __('frontendmanage.Key Feature Subtitle') }}
                                                                                                                        </label>
                                                                                                                        <input
                                                                                                                            class="primary_input_field"
                                                                                                                            placeholder=""
                                                                                                                            type="text"
                                                                                                                            name="key_feature_subtitle3[{{ $language->code }}]"
                                                                                                                            {{ $errors->has('key_feature_subtitle3') ? ' autofocus' : '' }}
                                                                                                                            value="{{ isset($home_content) ? getRawHomeContents($home_content, 'key_feature_subtitle3', $language->code) : '' }}">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endforeach
                                                                                            </div>
                                                                                            <div class="col-xl-12">
                                                                                                <div
                                                                                                    class="primary_input mb-25">
                                                                                                    <label
                                                                                                        class="primary_input_label"
                                                                                                        for="">{{ __('frontendmanage.Page Link') }}</label>

                                                                                                    <select
                                                                                                        class="primary_select   "
                                                                                                        name="key_feature_link3"
                                                                                                        {{ $errors->has('host') ? 'autofocus' : '' }}
                                                                                                        id="">
                                                                                                        <option
                                                                                                            data-display="{{ __('common.Select') }} {{ __('frontendmanage.Page Link') }}"
                                                                                                            value="">
                                                                                                            {{ __('common.Select') }}
                                                                                                            {{ __('frontendmanage.Page Link') }}

                                                                                                        </option>
                                                                                                        @foreach ($pages as $page)
                                                                                                            <option
                                                                                                                @if (getRawHomeContents($home_content, 'key_feature_link3', 'en') == $page->id) selected @endif
                                                                                                                value=" {{ $page->id }}">

                                                                                                                {{ $page->title }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                    </select>

                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-xl-12">
                                                                                                <div
                                                                                                    class="primary_input mt_25 mb-25">
                                                                                                    <label
                                                                                                        class="primary_input_label"
                                                                                                        for="">{{ __('frontendmanage.Key Feature Icon') }}
                                                                                                        3
                                                                                                    </label>
                                                                                                    <small>
                                                                                                        {{ __('courses.Recommended Size') }}
                                                                                                        50x50 px
                                                                                                    </small>
                                                                                                    <div
                                                                                                        class="primary_file_uploader">
                                                                                                        <input
                                                                                                            class="primary-input  filePlaceholder {{ @$errors->has('instructor_banner') ? ' is-invalid' : '' }}"
                                                                                                            type="text"
                                                                                                            id=""
                                                                                                            placeholder="Browse file"
                                                                                                            readonly=""
                                                                                                            {{ $errors->has('instructor_banner') ? ' autofocus' : '' }}>
                                                                                                        <button
                                                                                                            class=""
                                                                                                            type="button">
                                                                                                            <label
                                                                                                                class="primary-btn small fix-gr-bg"
                                                                                                                for="file8">{{ __('common.Browse') }}</label>
                                                                                                            <input
                                                                                                                type="file"
                                                                                                                class="d-none fileUpload imgInput8"
                                                                                                                name="key_feature_logo3"
                                                                                                                id="file8">
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-xl-12">
                                                                                                <div
                                                                                                    class="primary_input mt_25 mb-25">
                                                                                                    <img class=" imagePreview8"
                                                                                                        style="max-width: 100%"
                                                                                                        src="{{ asset('/' . getRawHomeContents($home_content, 'key_feature_logo3', 'en')) }}"
                                                                                                        alt="">
                                                                                                </div>
                                                                                            </div>


                                                                                            <div
                                                                                                class="mt-40 d-flex justify-content-between">
                                                                                                <button type="button"
                                                                                                    class="primary-btn tr-bg"
                                                                                                    data-dismiss="modal">{{ __('common.Cancel') }}</button>

                                                                                                <button
                                                                                                    class="primary-btn fix-gr-bg"
                                                                                                    type="submit">{{ __('common.Submit') }}
                                                                                                </button>

                                                                                            </div>

                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            {{-- update button --}}
                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg">
                                        <span class="ti-check"></span>
                                        {{ __('common.Update') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>


            </div>
    </section>

@endsection
@push('scripts')
    <script src="{{ asset('public/backend/vendors/nestable/jquery.nestable.min.js') }}"></script>
    <script>
        let show_why_choose = $('#show_why_choose');
        let whyChooseBox = $('#show_home_page_why_choose_box');
        show_why_choose.change(function() {
            if (show_why_choose.is(':checked')) {
                whyChooseBox.show();
            } else {
                whyChooseBox.hide();
            }
        });

        let key_feature_show = $('#key_feature_show');
        let keyFeatureBox = $('#keyFeatureBox');
        key_feature_show.change(function() {
            if (key_feature_show.is(':checked')) {
                keyFeatureBox.show();
            } else {
                keyFeatureBox.hide();
            }
        });

        let show_banner_section = $('#show_banner_section');
        let show_banner_section_box = $('#show_banner_section_box');
        let show_banner_section_title = $('#show_banner_section_title');
        show_banner_section.change(function() {
            if (show_banner_section.is(':checked')) {
                show_banner_section_box.show();
                show_banner_section_title.html('{{ __('frontendmanage.Banner Section Show In Homepage') }}');
            } else {
                show_banner_section_box.hide();
                show_banner_section_title.html(' {{ __('frontendmanage.Slider Show In Homepage') }}');

            }
        });

        let show_category_section = $('#show_category_section');
        let show_category_section_box = $('#show_category_section_box');
        show_category_section.change(function() {
            if (show_category_section.is(':checked')) {
                show_category_section_box.show();
            } else {
                show_category_section_box.hide();
            }
        });

        // -----

        let show_instructor_section = $('#show_instructor_section');
        let show_instructor_section_box = $('#show_instructor_section_box');
        show_instructor_section.change(function() {
            if (show_instructor_section.is(':checked')) {
                show_instructor_section_box.show();
            } else {
                show_instructor_section_box.hide();
            }
        });

        let show_best_category_section = $('#show_best_category_section');
        let show_best_category_section_box = $('#show_best_category_section_box');
        show_best_category_section.change(function() {
            if (show_best_category_section.is(':checked')) {
                show_best_category_section_box.show();
            } else {
                show_best_category_section_box.hide();
            }
        });

        // ---
        let show_course_section = $('#show_course_section');
        let show_course_section_box = $('#show_course_section_box');
        show_course_section.change(function() {
            if (show_course_section.is(':checked')) {
                show_course_section_box.show();
            } else {
                show_course_section_box.hide();
            }
        });
        // ---
        let show_quiz_section = $('#show_quiz_section');
        let show_quiz_section_box = $('#show_quiz_section_box');
        show_quiz_section.change(function() {
            if (show_quiz_section.is(':checked')) {
                show_quiz_section_box.show();
            } else {
                show_quiz_section_box.hide();
            }
        });


        // ---
        let show_testimonial_section = $('#show_testimonial_section');
        let show_testimonial_section_box = $('#show_testimonial_section_box');
        show_testimonial_section.change(function() {
            if (show_testimonial_section.is(':checked')) {
                show_testimonial_section_box.show();
            } else {
                show_testimonial_section_box.hide();
            }
        });

        // ---
        let show_article_section = $('#show_article_section');
        let show_article_section_box = $('#show_article_section_box');
        show_article_section.change(function() {
            if (show_article_section.is(':checked')) {
                show_article_section_box.show();
            } else {
                show_article_section_box.hide();
            }
        });

        // ---
        let show_subscribe_section = $('#show_subscribe_section');
        let show_subscribe_section_box = $('#show_subscribe_section_box');
        show_subscribe_section.change(function() {
            if (show_subscribe_section.is(':checked')) {
                show_subscribe_section_box.show();
            } else {
                show_subscribe_section_box.hide();
            }
        });


        let show_about_lms_section = $('#show_about_lms_section');
        let show_about_lms_section_box = $('#show_about_lms_section_box');
        show_about_lms_section.change(function() {
            if (show_about_lms_section.is(':checked')) {
                show_about_lms_section_box.show();
            } else {
                show_about_lms_section_box.hide();
            }
        });

        let show_live_class_section = $('#show_live_class_section');
        let show_live_class_section_box = $('#show_live_class_section_box');
        show_live_class_section.change(function() {
            if (show_live_class_section.is(':checked')) {
                show_live_class_section_box.show();
            } else {
                show_live_class_section_box.hide();
            }
        });
        // ---
        let show_become_instructor_section = $('#show_become_instructor_section');
        let show_become_instructor_section_box = $('#show_become_instructor_section_box');
        show_become_instructor_section.change(function() {
            if (show_become_instructor_section.is(':checked')) {
                show_become_instructor_section_box.show();
            } else {
                show_become_instructor_section_box.hide();
            }
        });


        let show_how_to_buy = $('#show_how_to_buy');
        let show_how_to_buy_box = $('#show_how_to_buy_box');
        show_how_to_buy.change(function() {
            if (show_how_to_buy.is(':checked')) {
                show_how_to_buy_box.show();
            } else {
                show_how_to_buy_box.hide();
            }
        });

        let show_home_page_faq = $('#show_home_page_faq');
        let show_home_page_faq_box = $('#show_home_page_faq_box');
        show_home_page_faq.change(function() {
            if (show_home_page_faq.is(':checked')) {
                show_home_page_faq_box.show();
            } else {
                show_home_page_faq_box.hide();
            }
        });
        let show_cta_section_toggle = $('#show_cta_section_toggle');
        let show_cta_section = $('#show_cta_section');
        show_cta_section_toggle.change(function() {
            if (show_cta_section_toggle.is(':checked')) {
                show_cta_section.show();
            } else {
                show_cta_section.hide();
            }
        });

        let banner_type = $('#banner_type');
        let banner_type_box = $('#banner_type_box');
        banner_type_box.change(function() {
            if (banner_type.is(':checked')) {
                banner_type_box.show();
            } else {
                banner_type_box.hide();
            }
        });

        let show_sponsor_section = $('#show_sponsor_section');
        let show_sponsor_section_box = $('#show_sponsor_section_box');
        show_sponsor_section.change(function() {
            if (show_sponsor_section.is(':checked')) {
                show_sponsor_section_box.show();
            } else {
                show_sponsor_section_box.hide();
            }
        });

        let show_subscription_plan = $('#show_subscription_plan');
        let show_subscription_plan_box = $('#show_subscription_plan_box');
        show_subscription_plan.change(function() {
            if (show_subscription_plan.is(':checked')) {
                show_subscription_plan_box.show();
            } else {
                show_subscription_plan_box.hide();
            }
        });

        // ---


        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview1").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput1").change(function() {
            readURL1(this);
        });

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview2").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput2").change(function() {
            readURL2(this);
        });


        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview3").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput3").change(function() {
            readURL3(this);
        });


        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview4").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput4").change(function() {
            readURL4(this);
        });


        function readURL5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview5").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput5").change(function() {
            readURL5(this);
        });


        function readURL6(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview6").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput6").change(function() {
            readURL6(this);
        });


        function readURL7(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview7").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput7").change(function() {
            readURL7(this);
        });


        function readURL8(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview8").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput8").change(function() {
            readURL8(this);
        });

        function readURL9(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview9").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput9").change(function() {
            readURL9(this);
        });

        function readURL10(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview10").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput10").change(function() {
            readURL10(this);
        });

        function readURL11(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview11").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput11").change(function() {
            readURL11(this);
        });

        function readURL12(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview12").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput12").change(function() {
            readURL12(this);
        });

        function readURL13(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview13").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput13").change(function() {
            readURL13(this);
        });

        function readURL14(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview14").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput14").change(function() {
            readURL14(this);
        });

        function readURL15(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview15").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput15").change(function() {
            readURL15(this);
        });

        function readURL16(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imagePreview16").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput16").change(function() {
            readURL16(this);
        });
        @if (Settings('frontend_active_theme') != 'tvt')
            $(document).on('mouseover', 'body', function() {

                $(".item_list").sortable({
                    cursor: "move",
                    // connectWith: ["#elementDiv", ".item_list"],
                    update: function(event, ui) {
                        let ids = $(this).sortable('toArray', {
                            attribute: 'data-id'
                        });
                        console.log(ids);
                        if (ids.length > 0) {
                            $.post("{{ route('frontend.changeHomePageBlockOrder') }}", {
                                '_token': '{{ csrf_token() }}',
                                'ids': ids
                            }, function(data) {

                            });
                        }

                    },
                });
            });
        @endif
    </script>
@endpush
