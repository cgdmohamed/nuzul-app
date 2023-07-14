<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Unit;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UnitController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.unit.index');
    }

    public function create()
    {
        abort_if(Gate::denies('unit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.unit.create');
    }

    public function edit(Unit $unit)
    {
        abort_if(Gate::denies('unit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.unit.edit', compact('unit'));
    }

    public function show(Unit $unit)
    {
        abort_if(Gate::denies('unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unit->load('unitDistrict', 'bookedBy', 'team');

        return view('admin.unit.show', compact('unit'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['unit_create', 'unit_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                    'image|dimensions:max_width=%s,max_height=%s',
                    request()->input('max_width', 100000),
                    request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new Unit();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    public function __construct()
    {
        $this->csvImportModel = Unit::class;
    }
}
