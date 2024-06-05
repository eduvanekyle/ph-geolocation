<?php

use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('island-groups')->group(function() {
    Route::get('/', [LocationController::class, 'islandGroups']);

    Route::get('/{islandGroupCode}', [LocationController::class, 'islandGroupShow']);

    Route::get('/{islandGroupCode}/regions', [LocationController::class, 'islandGroupRegions']);

    Route::get('/{islandGroupCode}/provinces', [LocationController::class, 'islandGroupProvinces']);

    Route::get('/{islandGroupCode}/districts', [LocationController::class, 'islandGroupDistricts']);
    
    Route::get('/{islandGroupCode}/municipalities', [LocationController::class, 'islandGroupMunicipalities']);
});

Route::prefix('regions')->group(function() {
    Route::get('/', [LocationController::class, 'regions']);

    Route::get('/{regionCode}', [LocationController::class, 'regionShow']);

    Route::get('/{regionCode}/provinces', [LocationController::class, 'regionProvinces']);

    Route::get('/{regionCode}/districts', [LocationController::class, 'regionDistricts']);
    
    Route::get('/{regionCode}/municipalities', [LocationController::class, 'regionMunicipalities']);
});

Route::prefix('provinces')->group(function() {
    Route::get('/', [LocationController::class, 'provinces']);

    Route::get('/{provinceCode}', [LocationController::class, 'provinceShow']);
    
    Route::get('/{provinceCode}/municipalities', [LocationController::class, 'provinceMunicipalities']);

    Route::get('/{provinceCode}/cities-municipalities', [LocationController::class, 'provinceMunicipalities']);
});

Route::prefix('cities-municipalities')->group(function() {
    Route::get('/', [LocationController::class, 'citiesMunicipalities']);
});
