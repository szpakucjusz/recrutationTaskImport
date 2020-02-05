<?php
namespace App\Repositories\Contracts;

use App\Model\City;

interface CityRepositoryInterface
{
    public function getByName(string $name): City;
}
