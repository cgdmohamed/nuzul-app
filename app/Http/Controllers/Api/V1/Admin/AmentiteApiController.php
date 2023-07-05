<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAmentiteRequest;
use App\Http\Requests\UpdateAmentiteRequest;
use App\Http\Resources\Admin\AmentiteResource;
use App\Models\Amentite;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AmentiteApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('amentite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AmentiteResource(Amentite::with(['unit', 'amenities', 'team'])->get());
    }

    public function store(StoreAmentiteRequest $request)
    {
        $amentite = Amentite::create($request->validated());

        return (new AmentiteResource($amentite))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Amentite $amentite)
    {
        abort_if(Gate::denies('amentite_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AmentiteResource($amentite->load(['unit', 'amenities', 'team']));
    }

    public function update(UpdateAmentiteRequest $request, Amentite $amentite)
    {
        $amentite->update($request->validated());

        return (new AmentiteResource($amentite))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Amentite $amentite)
    {
        abort_if(Gate::denies('amentite_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $amentite->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
