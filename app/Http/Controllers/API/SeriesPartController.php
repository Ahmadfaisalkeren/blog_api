<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Services\SeriesPartService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesPart\StoreSeriesPartRequest;
use App\Http\Requests\SeriesPart\UpdateSeriesPartRequest;

class SeriesPartController extends Controller
{
    protected $seriesPartService;

    public function __construct(SeriesPartService $seriesPartService)
    {
        $this->seriesPartService = $seriesPartService;
    }

    public function index(string $seriesSlug)
    {
        $seriesPart = $this->seriesPartService->getSeriesPartBySlug($seriesSlug);

        return response()->json([
            'status' => 200,
            'message' => "Series Part Data Fetched Successfully",
            'seriesPart' => $seriesPart,
        ], 200);
    }

    // public function publishedSeries()
    // {
    //     $seriesPart = $this->seriesPartService->publishedSeriesPart();

    //     return response()->json([
    //         'status' => 200,
    //         'message' => "Series Data Fetched Successfully",
    //         'seriesPart' => $seriesPart
    //     ], 200);
    // }

    public function store(StoreSeriesPartRequest $request)
    {
        $seriesPart = $this->seriesPartService->storeSeriespart($request->validated());

        return response()->json([
            'status' => 200,
            'message' => 'Series Part Stored Successfully',
            'seriesPart' => $seriesPart,
        ], 200);
    }

    public function edit(string $seriesPartId)
    {
        $seriesPart = $this->seriesPartService->getSeriesPartById($seriesPartId);

        return response()->json([
            'status' => 200,
            'message' => 'Series Part Fetched Successfully',
            'seriesPart' => $seriesPart,
        ], 200);
    }

    public function update(string $seriesPartId, UpdateSeriesPartRequest $request)
    {
        $seriesPart = $this->seriesPartService->updateSeriesPart($seriesPartId, $request->validated());

        return response()->json([
            'status' => 200,
            'message' => 'Series Part Updated Successfully',
            'seriesPart' => $seriesPart,
        ], 200);
    }

    public function destroy(string $seriesPartId)
    {
        $seriesPart = $this->seriesPartService->deleteSeriesPart($seriesPartId);

        return response()->json([
            'status' => 200,
            'message' => 'Series Part Deleted Successfully',
            'seriesPart' => $seriesPart,
        ], 200);
    }
}
