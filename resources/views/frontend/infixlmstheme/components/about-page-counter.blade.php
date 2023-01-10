<div>
    <style>
        .counter_area::before {
            background-image: url('{{ asset($about->image4) }}');
        }
    </style>
    <div class="counter_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    @if (!is_null(json_decode($about->counter_data, true)) && count(json_decode($about->counter_data, true)))
                        <div class="counter_wrapper">
                            @foreach (json_decode($about->counter_data, true) as $counter_array)
                                <div class="single_counter">
                                    <h3><span class="">{{ $counter_array['counter_total'] }}</span></h3>
                                    <div class="counter_content">
                                        <h4>{{ $counter_array['counter_title'] }}</h4>
                                        <p>{{ $counter_array['counter_details'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
