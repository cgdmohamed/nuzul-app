<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MobileAppSetting;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MobileAppSettingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mobile_app_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mobile-app-setting.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mobile_app_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mobile-app-setting.create');
    }

    public function edit(MobileAppSetting $mobileAppSetting)
    {
        abort_if(Gate::denies('mobile_app_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mobile-app-setting.edit', compact('mobileAppSetting'));
    }

    public function show(MobileAppSetting $mobileAppSetting)
    {
        abort_if(Gate::denies('mobile_app_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mobile-app-setting.show', compact('mobileAppSetting'));
    }
}
