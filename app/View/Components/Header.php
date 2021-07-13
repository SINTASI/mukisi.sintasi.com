<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public $headerAutoShow;
    public $backButton;
    public $headerTitle;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $headerAutoShow = false, bool $backButton = false, string $headerTitle = null)
    {
        $this->headerAutoShow = $headerAutoShow;
        $this->backButton = $backButton;
        $this->headerTitle = $headerTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
