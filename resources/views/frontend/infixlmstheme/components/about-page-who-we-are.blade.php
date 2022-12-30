<div>
    <div class="who_we_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="who_we_info">
                        <div class="info_left">
                            <span>{{__('frontendmanage.Who We Are')}}</span>
                            <p>{{ $about->who_we_are }}</p>
                        </div>
                        <div class="">
                            <p>{{ $about->banner_title }}</p>
                            <img src="{{ asset($about->banner_image) }}" alt="Instructor Image" width="100%" height="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
