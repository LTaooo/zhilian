<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Http\Controllers\ZhilianController;

Route::prefix('system')->group(function(){

    Route::get('zhilian/get', [ZhilianController::class, 'get']);
    Route::post('zhilian/create_or_update', [ZhilianController::class, 'createOrUpdate']);
    Route::apiResource('zhilian', ZhilianController::class);
    //next

});
