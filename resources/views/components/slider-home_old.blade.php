<div class="card notch-clear rounded-0 gradient-dark mb-n5">
    <div class="card-body mx-0 px-0 mt-n4 mb-4">
        <div class="splide single-slider slider-no-arrows slider-no-dots" id="single-slider-1">
            <div class="splide__track">
                <div class="splide__list">

                    @foreach ($slider as $sliders)
                        <div class="splide__slide">
                            <div class="{{ $sliders->class }}" data-card-height="{{ $sliders->height }}">
                                <img src="{{ $sliders->getFirstMediaUrl('slider') }}"
                                    alt="{{ setting('name') }}-{{ $sliders->name }}" height="100%" width="100%">
                                {{-- <div class="card-overlay bg-gradient"></div> --}}
                            </div>
                        </div>
                    @endforeach

                    @if (count($slider) === 0)
                        <div class="splide__slide">
                            <div class="card card-style mx-3 mt-4 no-img1" data-card-height="250">
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
