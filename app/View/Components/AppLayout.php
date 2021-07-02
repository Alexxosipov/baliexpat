<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public bool $showSponsors = true;
    public bool $showClosestGame = true;

    /**
     * AppLayout constructor.
     * @param bool $showSponsors
     * @param bool $showClosestGame
     */
    public function __construct(bool $showSponsors = true, bool $showClosestGame = true)
    {
        $this->showSponsors = $showSponsors;
        $this->showClosestGame = $showClosestGame;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
