<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/pages/{id}', [PageController::class, 'index']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
