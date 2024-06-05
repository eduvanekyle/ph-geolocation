<?php

namespace App\Console\Commands;

use App\Models\District;
use App\Models\Region;
use App\Models\Province;
use App\Models\IslandGroup;
use App\Models\Municipality;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class PopulateDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:populate-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->setIslandGroupData();
        $this->setRegionData();
        $this->setProvinceData();
        $this->setDistrictData();
        $this->setMunicipalityData();
        $this->info('POPULATION OF PH GEOLOCATION DONE!!');
    }

    public function setIslandGroupData() {
        $response = Http::get('https://psgc.gitlab.io/api/island-groups/');

        foreach($response->json() as $location) {
            IslandGroup::create([
                'code' => $location['code'],
                'name' => $location['name']
            ]);
        }

        $this->info('POPULATING ISLAND GROUP DATA DONE!');
    }

    public function setRegionData() {
        $islandGroups = IslandGroup::all();

        foreach($islandGroups as $island) {
            $response = Http::get('https://psgc.gitlab.io/api/island-groups/' . $island->code . '/regions/');

            foreach($response->json() as $location) {
                Region::create([
                    'code' => $location['code'],
                    'name' => $location['name'],
                    'region_name' => $location['regionName'],
                    'island_group_code' => $location['islandGroupCode']
                ]);
            }
        }

        $this->info('POPULATING REGION DATA DONE!');
    }

    public function setProvinceData() {
        $islandGroups = IslandGroup::all();

        foreach($islandGroups as $island) {
            sleep(2);
            $response = Http::get('https://psgc.gitlab.io/api/island-groups/' . $island->code . '/provinces/');

            foreach($response->json() as $location) {
                Province::create([
                    'code' => $location['code'],
                    'name' => $location['name'],
                    'region_code' => $location['regionCode'],
                    'island_group_code' => $location['islandGroupCode']
                ]);
            }
        }

        $this->info('POPULATING PROVINCE DATA DONE!');
    }

    public function setDistrictData() {
        $islandGroups = IslandGroup::all();

        foreach($islandGroups as $island) {
            sleep(5);
            $response = Http::get('https://psgc.gitlab.io/api/island-groups/' . $island->code . '/districts/');

            foreach($response->json() as $location) {
                District::create([
                    'code' => $location['code'],
                    'name' => $location['name'],
                    'region_code' => $location['regionCode'],
                    'island_group_code' => $location['islandGroupCode']
                ]);
            }
        }

        $this->info('POPULATING DISTRICT DATA DONE!');
    }

    public function setMunicipalityData() {
        $islandGroups = IslandGroup::all();

        foreach($islandGroups as $island) {
            sleep(10);
            $response = Http::get('https://psgc.gitlab.io/api/island-groups/' . $island->code . '/cities-municipalities/');

            foreach($response->json() as $location) {
                Municipality::create([
                    'code' => $location['code'],
                    'name' => $location['name'],
                    'old_name' => $location['oldName'],
                    'is_capital' => $location['isCapital'],
                    'district_code' => $location['districtCode'],
                    'province_code' => $location['provinceCode'],
                    'region_code' => $location['regionCode'],
                    'island_group_code' => $location['islandGroupCode']
                ]);
            }
        }

        $this->info('POPULATING MUNICIPALITY DATA DONE!');
    }
}
