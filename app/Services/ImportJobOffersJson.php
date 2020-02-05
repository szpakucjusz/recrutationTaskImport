<?php
namespace App\Services;

use App\Repositories\Contracts\CityRepositoryInterface;
use App\Repositories\Contracts\ImportJobOffersInterface;
use App\Repositories\Contracts\JobOfferRepositoryInterface;

class ImportJobOffersJson implements ImportJobOffersInterface
{
    /**
     * @var JobOfferRepositoryInterface
     */
    private $jobOfferRepository;
    /**
     * @var CityRepositoryInterface
     */
    private $cityRepository;

    public function __construct(JobOfferRepositoryInterface $jobOfferRepository, CityRepositoryInterface $cityRepository)
    {
        $this->jobOfferRepository = $jobOfferRepository;
        $this->cityRepository = $cityRepository;
    }

    public function import(): void
    {
        $urlToImport = 'https://demo.appmanager.pl/api/v1/ads?_format=json';
        $result = json_decode(file_get_contents($urlToImport));
        foreach ($result->data as $offer) {
            $this->jobOfferRepository->save($offer->content->title);
            $jobOffer = $this->jobOfferRepository->jobOffer();
            foreach ($offer->cities as $city) {
                $cityModel = $this->cityRepository->getByName($city);
                $jobOffer->cities()->attach($cityModel->id);
            }
        }
    }
}
