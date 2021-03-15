<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Slider;

class cumpleanios extends Component
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
        $cumpleaneros = \DB::table('cumpleanios')->paginate(2);

        return view('components.cumpleanios', compact('cumpleaneros'));
    }
}
