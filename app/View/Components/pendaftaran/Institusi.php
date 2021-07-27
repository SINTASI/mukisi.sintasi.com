<?php

namespace App\View\Components\pendaftaran;

use App\Models\Map;
use App\Models\MasterCategory;
use Illuminate\View\Component;

class Institusi extends Component
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
        return view('components.pendaftaran.institusi', [
            'category' => MasterCategory::loadHtml(),
            'mapscript' => Map::loadScript(),
            'prov' => Map::loadProv(),
        ]);
    }
}
