<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AboutPageWhoWeAre extends Component
{
    public $about;

    public function __construct($about)
    {
        $this->about = $about;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view(theme('components.about-page-who-we-are'));
    }
}
