<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Slider;

class sliders extends Component
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
        $sliders = Slider::orderBy('id', 'asc')->paginate();
        $oneSlider = $sliders->min('id');
        $idNumero = $oneSlider; 
        $oneSlider = Slider::where('id', $oneSlider)
                    ->orderBy('id')
                    ->get();

        //$sliders = Slider::orderBy('id', 'asc')->paginate();
        $sliders = Slider::where('id', '!=', $idNumero)->get();

        
        return view('components.sliders', compact('sliders', 'oneSlider'));
    }
}
