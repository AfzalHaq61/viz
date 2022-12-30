<?php

namespace Modules\FrontendManage\Http\Controllers;

use Exception;
use Throwable;
use App\AboutPage;
use App\Http\Controllers\Controller;
use App\Traits\ImageStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Cache;
use Modules\FrontendManage\Entities\FrontPage;
use Modules\SystemSetting\Entities\SocialLink;
use Modules\FrontendManage\Entities\HomeSlider;
use Modules\SystemSetting\Entities\Testimonial;
use Modules\FrontendManage\Entities\HomeContent;
use Modules\FrontendManage\Entities\CourseSetting;
use Modules\FrontendManage\Entities\PrivacyPolicy;
use Modules\FrontendManage\Entities\TopbarSetting;
use Modules\SystemSetting\Entities\FrontendSetting;

class InstructorSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        try {
            if (function_exists('SaasDomain')) {
                $domain = SaasDomain();
            } else {
                $domain = 'main';
            }
            $home_content = app('getHomeContent');
            $pages = FrontPage::where('status', 1)->get();
            $blocks = Cache::rememberForever('homepage_block_positions' . $domain, function () {
                return DB::table('homepage_block_positions')->select(['id', 'block_name', 'order'])->orderBy('order', 'asc')->get();
            });

            return view('frontendmanage::instructor_content', compact('home_content', 'pages', 'blocks'));
        } catch (Throwable $th) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('frontendmanage::instructor_content');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('frontendmanage::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('frontendmanage::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }
        try {

            $items = $request->except([
                'instructor_banner', 'best_category_banner',
                'how_to_buy_logo1', 'how_to_buy_logo2',
                'how_to_buy_logo3', 'how_to_buy_logo4',
                'subscribe_logo', 'key_feature_logo1',
                'key_feature_logo2', 'key_feature_logo3',
                'banner_logo', '_token', 'url', 'id',
                'become_instructor_logo', 'slider_banner',
                'cta_img_upper', 'cta_img_lower'
            ]);
            foreach ($items as $key => $item) {
                UpdateHomeContent($key, $item);
            }

            GenerateHomeContent(SaasDomain());

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->route('frontend.instructor');


        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
