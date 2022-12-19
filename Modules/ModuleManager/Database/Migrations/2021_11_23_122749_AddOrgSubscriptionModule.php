<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrgSubscriptionModule extends Migration
{

    public function up()
    {
        $totalCount = \Illuminate\Support\Facades\DB::table('modules')->count();
        $newModule = new \Modules\ModuleManager\Entities\Module();
        $newModule->name = 'OrgSubscription';
        $newModule->details = 'OrgSubscription Module For InfixLMS.';
        $newModule->status = 0;
        $newModule->order = $totalCount;
        $newModule->save();
    }

    public function down()
    {
        //
    }
}
