<?php
namespace App\Repositories;

use App\Model\City;
use App\Model\JobOffer;
use App\Repositories\Contracts\JobOfferRepositoryInterface;

class JobOfferRepository implements JobOfferRepositoryInterface
{
    private $jobOffer;

    public function save(string $title): void
    {
        $this->jobOffer = JobOffer::create(['title' => $title]);
    }

    public function jobOffer(): ?JobOffer
    {
        return $this->jobOffer;
    }
}
