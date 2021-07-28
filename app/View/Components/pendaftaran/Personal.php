<?php

namespace App\View\Components\pendaftaran;

use App\Models\Map;
use App\Models\MasterCategory;
use Illuminate\View\Component;

class Personal extends Component
{
    public $prov;
    public $mapscript;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->mapscript =  Map::loadScript();
        $this->prov =  Map::loadProv();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pendaftaran.personal');
    }
}
