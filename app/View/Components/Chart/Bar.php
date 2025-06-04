<?php

namespace App\View\Components\Chart;

use Illuminate\View\Component;

class Bar extends Component
{
    public $labels;
    public $data;
    public $title;

    public function __construct($labels = [], $data = [], $title = '')
    {
        $this->labels = $labels;
        $this->data = $data;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.chart.bar');
    }
}
