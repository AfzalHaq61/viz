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
    <section class="admin-visitor-area up_st_admin_visitor bg-white p-4">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <form action="{{ route('getFutureCourse.update', $futureCourse->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $futureCourse->title }}">
                        </div>

                        @if($futureCourse->image)
                        <div class="form-group">
                            <h4>Current Image</h4>
                            <img src="{{ asset("/public/future-courses/$futureCourse->image") }}" alt="Current Image">
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('/')}}/Modules/CourseSetting/Resources/assets/js/course.js"></script>
@endpush
