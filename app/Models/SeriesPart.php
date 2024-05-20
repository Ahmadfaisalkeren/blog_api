<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class SeriesPart extends Model
{
    use HasFactory, HasApiTokens, HasUuids;

    protected $table = 'series_parts';
    protected $fillable = [
        'series_id',
        'part_number',
        'title',
        'content',
    ];

    public function series()
    {
        return $this->belongsTo(Series::class, 'series_id', 'id');
    }
}
