<?php

namespace App\View\Components;

use Illuminate\View\Component;

class upload-banner-news extends Component
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
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $dimensions = ['w' => 300, 'h' => 100];
        return view('components.upload-banner-news', ['dimensions' => $dimensions]);
    }
}
