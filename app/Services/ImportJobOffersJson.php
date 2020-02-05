<?php
namespace App\Services;

use App\Repositories\Contracts\ImportJobOffersInterface;

class ImportJobOffersJson implements ImportJobOffersInterface
{
    public function import(): void
    {
        $urlToImport = 'https://demo.appmanager.pl/api/v1/ads?_format=json';
        $result = json_decode(file_get_contents($urlToImport));
        foreach ($result->data as $offer) {
            print_r("<pre>");
            print_r($offer);
            print_r("</pre>");
        }
    }
}
