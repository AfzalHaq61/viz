@extends('backend.master')
@section('mainContent')

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1>{{__('setting.Setting')}}</h1>
                <div class="bc-pages">
                    <a href="{{url('dashboard')}}">{{__('dashboard.Dashboard')}}</a>
                    <a href="#">{{__('setting.User Manage')}}</a>
                    <a href="#">{{__('setting.Setting')}}</a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white">
                        <form action="{{ route('staffs.settings') }}" method="POST" id="staff_addForm"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-4">
                                    <p class="text-uppercase mb-0">@lang('common.Staff can view course')</p>
                                    <div class="d-flex radio-btn-flex mt-30">
                                        <div class="mr-20">
                                            <input type="radio" name="staff_can_view_course" id="relationFather5"
                                                   value="yes"
                                                   class="common-radio relationButton" {{ Settings('staff_can_view_course') == 'yes' ? 'checked' : ''}}>
                                            <label for="relationFather5">@lang('common.Yes')</label>
                                        </div>
                                        <div class="mr-20">
                                            <input type="radio" name="staff_can_view_course" id="relationMother6"
                                                   value="no"
                                                   class="common-radio relationButton" {{ Settings('staff_can_view_course') == 'no' ? 'checked' : ''}}>
                                            <label for="relationMother6">@lang('common.No')</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 text-center mt-20">
                                    <div class="d-flex  pt_20">
                                        <button type="submit" class="primary-btn semi_large2 fix-gr-bg"
                                                id="save_button_parent"><i class="ti-check"></i>{{ __('common.Save') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script type="text/javascript">
        function getField() {
            var employment_type = $('#employment_type').val();
            if (employment_type == "Provision") {
                $("#provisional_time").removeAttr("disabled");
            } else if (employment_type == "Contract") {
                $("#provisional_time").attr('disabled', true);
            } else {
                $("#bank_name").attr('Permanent', true);
                $("#provisional_time").attr('disabled', true);
            }
        }

    </script>
@endpush
