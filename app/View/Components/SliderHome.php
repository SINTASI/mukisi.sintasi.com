<?php

namespace App\View\Components;

use App\Models\Slider;

use Illuminate\View\Component;
use App\Models\WpRevsliderSlide;

class SliderHome extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slider-home', [
            // 'slider' => Slider::where('active', true)->orderBy('seq_no')->get()
            'sliders' => WpRevsliderSlide::orderBy('slide_order')->get()
        ]);
    }
}
