@extends('backend.master')
@section('styles')
    <style>
        #blogImgShow {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            max-height: 150px;
        }

        .img_div {
            display: flex;
            height: 150px;
            width: 150px;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection
@section('mainContent')
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1>{{ __('frontendmanage.Popup Content') }}</h1>
                <div class="bc-pages">
                    <a href="{{route('dashboard')}}">{{__('common.Dashboard')}}</a>
                    <a href="#">{{__('frontendmanage.Frontend CMS')}}</a>
                    <a class="active"
                       href="#">{{ __('frontendmanage.Popup Content') }}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">

                </div>
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white student-details header-menu">
                        @include('popupcontent::popup_content.componant.form')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('popupcontent::popup_content.componant.scripts')
