<div>
    <div class="breadcrumb_area bradcam_bg_2"
         style="background-image: url('{{asset(@$banner)}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="breadcam_wrap">
                        @if (request()->route()->getName() != 'about')
                            <span>
                                {{@$title}}
                            </span>
                        @endif

                        <h3>
                            {{@$sub_title}}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
