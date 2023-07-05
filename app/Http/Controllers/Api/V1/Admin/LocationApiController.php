<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Http\Resources\Admin\LocationResource;
use App\Models\Location;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LocationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LocationResource(Location::with(['team'])->get());
    }

    public function store(StoreLocationRequest $request)
    {
        $location = Location::create($request->validated());

        return (new LocationResource($location))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Location $location)
    {
        abort_if(Gate::denies('location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LocationResource($location->load(['team']));
    }

    public function update(UpdateLocationRequest $request, Location $location)
    {
        $location->update($request->validated());

        return (new LocationResource($location))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Location $location)
    {
        abort_if(Gate::denies('location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $location->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
