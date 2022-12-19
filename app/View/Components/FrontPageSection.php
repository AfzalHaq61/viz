<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FrontPageSection extends Component
{
    public $page;
    public $futureCourses;

    public function __construct($page, $futureCourses)
    {
        $this->page = $page;
        $this->futureCourses = $futureCourses;
    }


    public function render()
    {
        return view(theme('components.front-page-section'));
    }
}
