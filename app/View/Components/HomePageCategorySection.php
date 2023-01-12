<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use Modules\FrontendManage\Entities\FrontPage;
use Modules\CourseSetting\Entities\Course;
use Modules\FrontendManage\Entities\KeyFeature;

class HomePageCategorySection extends Component
{

    public $homeContent, $categories;

    public function __construct($homeContent, $categories)
    {
        if (isset($homeContent->key_feature_link1) || isset($homeContent->key_feature_link2) || isset($homeContent->key_feature_link3)) {
            $FrontPageList = Cache::rememberForever('FrontPageList_' . app()->getLocale() . SaasDomain(), function () use ($homeContent) {
                return FrontPage::whereIn('id', [$homeContent->key_feature_link1, $homeContent->key_feature_link2, $homeContent->key_feature_link3])
                    ->get(['id', 'slug']);
            });

            $homeContent->feature_link1 = "";
            if (isset($homeContent->key_feature_link1)) {
                $page = $FrontPageList->where('id', $homeContent->key_feature_link1)->first();
                if ($page) {
                    $homeContent->feature_link1 = $page->is_static == 1 ? route('frontPage', [$page->slug]) : url($page->slug);
                }
            }

            $homeContent->feature_link2 = "";
            if (isset($homeContent->key_feature_link2)) {
                $page = $FrontPageList->where('id', $homeContent->key_feature_link2)->first();
                if ($page) {
                    $homeContent->feature_link2 = $page->is_static == 1 ? route('frontPage', [$page->slug]) : url($page->slug);
                }
            }

            $homeContent->feature_link3 = "";
            if (isset($homeContent->key_feature_link3)) {
                $page = $FrontPageList->where('id', $homeContent->key_feature_link3)->first();
                if ($page) {
                    $homeContent->feature_link3 = $page->is_static == 1 ? route('frontPage', [$page->slug]) : url($page->slug);
                }
            }
        }

        $this->homeContent = $homeContent;
        $this->categories = $categories;
    }


    public function render()
    {
        $top_courses = Course::orderBy('total_enrolled', 'desc')->where('status', 1)->where('type', 1)->take(4)->with('lessons', 'activeReviews', 'enrollUsers', 'cartUsers')->get();
        $key_features = KeyFeature::all();
        return view(theme('components.home-page-category-section'), compact('top_courses', 'key_features'));
    }
}
