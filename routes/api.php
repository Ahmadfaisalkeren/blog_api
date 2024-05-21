<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\HeroController;
use App\Http\Controllers\API\PostsController;
use App\Http\Controllers\API\SeriesController;
use App\Http\Controllers\API\SeriesPartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [LoginController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {

    Route::post('post', [PostsController::class, 'store']);

    Route::put('post/{postId}', [PostsController::class, 'update']);
    Route::delete('post/{postId}', [PostsController::class, 'destroy']);
    Route::post('upload/image', [PostsController::class, 'upload']);

    Route::post('hero', [HeroController::class, 'store']);
    Route::get('hero/{heroId}', [HeroController::class, 'edit']);
    Route::put('hero/{heroId}', [HeroController::class, 'update']);
    Route::delete('hero/{heroId}', [HeroController::class, 'destroy']);

    Route::post('series', [SeriesController::class, 'store']);
    Route::get('series/{seriesId}', [SeriesController::class, 'edit']);
    Route::put('series/{seriesId}', [SeriesController::class, 'update']);
    Route::delete('series/{seriesId}', [SeriesController::class, 'destroy']);

    Route::post('seriesPart', [SeriesPartController::class, 'store']);
    Route::get('seriesParty/{seriesPartId}', [SeriesPartController::class, 'edit']);
    Route::put('seriesPart/{seriesPartId}', [SeriesPartController::class, 'update']);
    Route::delete('seriesPart/{seriesPartId}', [SeriesPartController::class, 'destroy']);
});

Route::get('posts', [PostsController::class, 'index']);
Route::get('publishedPosts', [PostsController::class, 'publishedPosts']);
Route::get('post/{postId}', [PostsController::class, 'edit']);
Route::get('post/{slug}/show', [PostsController::class, 'show']);
Route::get('heroes', [HeroController::class, 'index']);
Route::get('series', [SeriesController::class, 'index']);
Route::get('series/{slug}/show', [SeriesController::class, 'show']);
Route::get('publishedSeries', [SeriesController::class, 'publishedSeries']);
Route::get('seriesPart/{seriesSlug}', [SeriesPartController::class, 'index']);
