<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Region;
use App\Models\IslandGroup;
use App\Models\Municipality;
use App\Models\Province;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function islandGroups() {
        $islands = IslandGroup::all();

        if(!isset($islands)) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($islands);
    }

    public function islandGroupShow($islandGroupCode) {
        $island = IslandGroup::where('code', $islandGroupCode);

        if($island->doesntExist()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($island->first());
    }

    public function islandGroupRegions($islandGroupCode) {
        $island = Region::where('island_group_code', $islandGroupCode);

        if($island->doesntExist()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($island->get());
    }

    public function islandGroupProvinces($islandGroupCode) {
        $island = Province::where('island_group_code', $islandGroupCode);

        if($island->doesntExist()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($island->get());
    }

    public function islandGroupDistricts($islandGroupCode) {
        $island = District::where('island_group_code', $islandGroupCode);

        if($island->doesntExist()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($island->get());
    }

    public function islandGroupMunicipalities($islandGroupCode) {
        $island = Municipality::where('island_group_code', $islandGroupCode);

        if($island->doesntExist()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($island->get());
    }

    public function regions() {
        $regions = Region::all();

        if(!isset($regions)) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($regions);
    }

    public function regionShow($regionCode) {
        $region = Region::where('code', $regionCode);

        if($region->doesntExist()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($region->first());
    }

    public function regionProvinces($regionCode) {
        $province = Province::where('region_code', $regionCode);

        if($province->doesntExist()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($province->get());
    }

    public function regionDistricts($regionCode) {
        $district = District::where('region_code', $regionCode);

        if($district->doesntExist()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($district->get());
    }

    public function regionMunicipalities($regionCode) {
        $municipality = Municipality::where('region_code', $regionCode);

        if($municipality->doesntExist()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($municipality->get());
    }

    public function provinces() {
        $provinces = Province::all();

        if(!isset($provinces)) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($provinces);
    }

    public function provinceShow($provinceCode) {
        $province = Province::where('code', $provinceCode);

        if($province->doesntExist()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($province->first());
    }

    public function provinceMunicipalities($provinceCode) {
        $municipality = Municipality::where('province_code', $provinceCode);

        if($municipality->doesntExist()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($municipality->get());
    }

    public function citiesMunicipalities() {
        $municipalities = Municipality::all();

        if(!isset($municipalities)) {
            return response()->json([
                'status' => 'error',
                'message' => 'No records found'
            ], 404);
        }

        return response($municipalities);
    }
}
