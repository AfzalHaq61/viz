<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Modules\CourseSetting\Entities\Course;

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
        $top_courses = Course::orderBy('total_enrolled', 'desc')->where('status', 1)->where('type', 1)->with('lessons', 'activeReviews', 'enrollUsers', 'cartUsers')->get();

        return view(theme('components.front-page-section'), compact('top_courses'));
    }
}
