<?php

namespace Modules\FrontendManage\Entities;

use App\Traits\Tenantable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Spatie\Translatable\HasTranslations;

class InstructorContent extends Model
{
    use Tenantable;

    protected $guarded = [];

    use HasTranslations;

    public $translatable = ['value'];

    //    public static function boot()
    //    {
    //        if (function_exists('SaasDomain')) {
    //            $domain = SaasDomain();
    //        } else {
    //            $domain = 'main';
    //        }
    //        parent::boot();
    //        self::created(function ($model) use ($domain) {
    //
    //            GenerateHomeContent($domain);
    //        });
    //        self::updated(function ($model) use ($domain) {
    //            GenerateHomeContent($domain);
    //        });
    //    }

    public static function boot()
    {
        parent::boot();
        self::created(function ($model) {
            if (function_exists('clearAllLangCache')) {
                clearAllLangCache('instructor_contents');
            }
        });
        self::updated(function ($model) {
            if (function_exists('clearAllLangCache')) {
                clearAllLangCache('instructor_contents');
            }
        });
        self::deleted(function ($model) {
            if (function_exists('clearAllLangCache')) {
                clearAllLangCache('instructor_contents');
            }
        });
    }
}
