<?php

namespace App\View\Components\Pendaftaran;

use App\Models\Map;
use App\Models\Form;
use App\Models\Profesi;
use App\Models\MasterCategory;
use Illuminate\View\Component;

class Personal extends Component
{
    public $prov;
    public $forms;
    public $profesi;
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
        $this->profesi =  Profesi::loadHtml();
        $this->forms =  Form::with('subs')->get();
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
