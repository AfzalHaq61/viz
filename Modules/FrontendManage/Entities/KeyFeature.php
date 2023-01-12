<?php

namespace Modules\FrontendManage\Entities;

use App\Traits\Tenantable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Spatie\Translatable\HasTranslations;

class KeyFeature extends Model
{
    use Tenantable;

    protected $fillable = [
        'key_feature_title',
        'key_feature_subtitle',
        'key_feature_link',
        'key_feature_logo',
        'show_key_feature',
    ];
}
