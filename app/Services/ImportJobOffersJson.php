<?php
namespace App\Services;

use App\Model\City;
use App\Model\JobOffer;
use App\Model\PivotJobOfferToCity;
use App\Repositories\Contracts\CityRepositoryInterface;
use App\Repositories\Contracts\ImportJobOffersInterface;
use App\Repositories\Contracts\JobOfferRepositoryInterface;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;

class ImportJobOffersJson implements ImportJobOffersInterface
{
    const URL_TO_IMPORT = 'https://demo.appmanager.pl/api/v1/ads?_format=json';
    /**
     * @var JobOfferRepositoryInterface
     */
    private $jobOfferRepository;
    /**
     * @var CityRepositoryInterface
     */
    private $cityRepository;
    /**
     * @var Log
     */
    private $logger;

    public function __construct(JobOfferRepositoryInterface $jobOfferRepository, CityRepositoryInterface $cityRepository, Logger $logger)
    {
        $this->jobOfferRepository = $jobOfferRepository;
        $this->cityRepository = $cityRepository;
        $this->logger = $logger;
    }

    public function import(): void
    {
        //only for testing purposes
        if (false) {
            PivotJobOfferToCity::truncate();
            City::truncate();
            JobOffer::truncate();
        }
        try {
            $result = json_decode(file_get_contents(self::URL_TO_IMPORT));
            foreach ($result->data as $offer) {
                try {
                    $this->parseOffer($offer);
                } catch(\Exception $e) {
                    $this->logger->critical('Problem with parse single offer: ' . $e->getMessage());
                }
            }
        } catch(\Exception $e) {
            $this->logger->critical('Problem with parser offer: ' . $e->getMessage());
        }
    }

    private function parseOffer(object $offer): void
    {
        $this->jobOfferRepository->save($offer->content->title);
        $jobOffer = $this->jobOfferRepository->jobOffer();
        foreach ($offer->cities as $city) {
            $cityModel = $this->cityRepository->getByName($city);
            $jobOffer->cities()->attach($cityModel->id);
        }
    }
}
