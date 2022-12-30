<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InstructorsPagePopulerSection extends Component
{
    public $instructors, $testemonial;

    public function __construct($instructors, $testemonial)
    {
        $this->instructors = $instructors;
        $this->testemonial = $testemonial;
    }

    public function render()
    {
        return view(theme('components.instructors-page-populer-section'));
    }
}
