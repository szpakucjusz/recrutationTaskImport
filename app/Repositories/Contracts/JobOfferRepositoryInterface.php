<?php
namespace App\Repositories\Contracts;

interface JobOfferRepositoryInterface
{
    public function save(string $name): void;
}
