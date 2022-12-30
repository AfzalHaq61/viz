<div>
    <div class="instractors_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section__title2 mb_76">
                        <span>{{ $testemonial->instructor_testemonials_title }}</span>
                        <h4>{{ $testemonial->instructor_testemonials_subtitle }}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (isset($instructors))
                    @foreach ($instructors->take(4) as $instructor)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="single_instractor mb_30">
                                <a href="{{ route('instructorDetails', [$instructor->id, Str::slug($instructor->name, '-')]) }}"
                                    class="thumb">
                                    <img src="{{ getInstructorImage($instructor->image) }}" alt="">
                                </a>
                                <a
                                    href="{{ route('instructorDetails', [$instructor->id, Str::slug($instructor->name, '-')]) }}">
                                    <h4>{{ $instructor->name }}</h4>
                                </a>
                                <span>{{ $instructor->headline }}</span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
