<?php
namespace App\Repositories;

use App\Model\City;
use App\Repositories\Contracts\CityRepositoryInterface;

class CityRepository implements CityRepositoryInterface
{
    public function getByName(string $name): City
    {
        $city = City::where('name', $name)->first();
        return $city ?? $this->save($name);
    }

    private function save(string $name): City
    {
        return City::create(['name' => $name]);
    }
}
