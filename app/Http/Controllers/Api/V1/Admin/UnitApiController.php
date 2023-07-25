<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Http\Resources\Admin\UnitResource;
use App\Models\Unit;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

//added namespaces
use Illuminate\Support\Facades\Auth;


class UnitApiController extends Controller
{
    use MediaUploadTrait;
    /*
    public function index()
    {
        abort_if(Gate::denies('unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UnitResource(Unit::with(['unitDistrict', 'bookedBy', 'team'])->get());
    }
*/
    public function index()
    {
        abort_if(Gate::denies('unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userId = Auth::id();

        // Retrieve units where booked_by_id is equal to the authenticated user's ID
        $units = Unit::where('booked_by_id', $userId)
            ->with(['unitDistrict', 'bookedBy', 'team'])
            ->get();

        return new UnitResource($units);
    }
    public function store(StoreUnitRequest $request)
    {
        $unit = Unit::create($request->validated());

        foreach ($request->input('unit_unit_images', []) as $file) {
            $unit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('unit_unit_images');
        }

        return (new UnitResource($unit))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Unit $unit)
    {
        abort_if(Gate::denies('unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UnitResource($unit->load(['unitDistrict', 'bookedBy', 'team']));
    }

    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $unit->update($request->validated());

        if (count($unit->unit_unit_images) > 0) {
            foreach ($unit->unit_unit_images as $media) {
                if (!in_array($media->file_name, $request->input('unit_unit_images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $unit->unit_unit_images->pluck('file_name')->toArray();
        foreach ($request->input('unit_unit_images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $unit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('unit_unit_images');
            }
        }

        return (new UnitResource($unit))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Unit $unit)
    {
        abort_if(Gate::denies('unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unit->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
