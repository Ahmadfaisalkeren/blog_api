<?php

namespace App\Services;

use App\Models\Series;
use App\Models\SeriesPart;

/**
 * Class SeriesPartService.
 */
class SeriesPartService
{
    public function getSeriesPartBySlug(string $seriesSlug)
    {
        $series = Series::where('slug', $seriesSlug)->firstOrFail();

        $seriesPart = SeriesPart::with('series')->where('series_id', $series->id)->orderBy('created_at', 'ASC')->get();

        return $seriesPart;
    }

    public function storeSeriesPart(array $seriesPartData)
    {
        $seriesPart = SeriesPart::create($seriesPartData);

        return $seriesPart;
    }

    public function getSeriesPartById(string $seriesPartId)
    {
        $seriesPart = SeriesPart::findOrFail($seriesPartId);

        return $seriesPart;
    }

    public function updateSeriesPart(string $seriesPartId, array $seriesPartData)
    {
        $seriesPart = SeriesPart::findOrFail($seriesPartId);

        $seriesPart->title = $seriesPartData['title'] ?? $seriesPart->title;
        $seriesPart->part_number = $seriesPartData['part_number'] ?? $seriesPart->part_number;
        $seriesPart->content = $seriesPartData['content'] ?? $seriesPart->content;

        $seriesPart->save();

        return $seriesPart;
    }

    public function deleteSeriesPart(string $seriesPartId)
    {
        $seriesPart = SeriesPart::findOrFail($seriesPartId);

        $seriesPart->delete();

        return $seriesPart;
    }
}
