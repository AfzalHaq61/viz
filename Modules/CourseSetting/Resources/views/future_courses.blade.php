@extends('backend.master')


@php
    $table_name = '';
    $text = 'Future';
@endphp
@section('table')
    {{$table_name}}
@stop
@section('mainContent')
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1>{{$text}} {{__('courses.Courses')}}</h1>
                <div class="bc-pages">
                    <a href="{{route('dashboard')}}">{{__('common.Dashboard')}}</a>
                    <a href="#">{{__('courses.Courses')}}</a>
                    <a href="#">{{$text}} {{__('courses.Courses')}}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div>
                <a class="btn btn-primary mb-2" href="{{ route('getFutureCourse.create') }}">Add Future Course</a>
            </div>
            <table class="table bg-white">
                <thead>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($futureCourses as $course)
                    <tr>
                      <td>{{ $course->id }}</td>
                      <td> <img src="{{ asset("public/future-courses/$course->image") }}" alt="Couse Image" width="80" height="80"> </td>
                      <td>{{ $course->title }}</td>
                      <td>
                        <a href="{{ route('getFutureCourse.edit', $course->id) }}" class="btn btn-info">Edit</a>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-future-course-modal" onclick="deleteCourse('{{ route('getFutureCourse.delete', $course->id) }}')">Delete</button>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            function deleteCourse(route) {

                jQuery('#confirm-delete').modal('show', {backdrop: 'static'});
                jQuery('#confirm-delete form').attr('action', route);
            }
        </script>

<div class="modal fade admin-query" id="confirm-delete">
    <form action="" method="post">
        @csrf
        @method('DELETE')
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('common.Delete Confirmation') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">{{__('common.Are you sure to delete ?')}}</h3>
                    <div class="col-lg-12 text-center">
                        <div class="mt-40 d-flex justify-content-between">
                            <button type="button" class="primary-btn tr-bg"
                                    data-dismiss="modal">{{__('common.Cancel')}}</button>
                            <button type="submit" id="delete_link" class="primary-btn semi_large2 fix-gr-bg">{{__('common.Delete')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
    </section>

@endsection
@push('scripts')
    <script src="{{asset('/')}}/Modules/CourseSetting/Resources/assets/js/course.js"></script>
@endpush
