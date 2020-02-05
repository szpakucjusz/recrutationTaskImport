<?php
namespace App\Http\Controllers;

use App\Model\JobOffer;
use App\Model\Post;
use App\Repositories\Contracts\ImportJobOffersInterface;
use Illuminate\Support\Facades\DB;

/**
 * Class IndexController
 */
class ImportController extends Controller
{
    /**
     * @var ImportJobOffersInterface
     */
    private $importJobOffers;

    public function __construct(ImportJobOffersInterface $importJobOffers)
    {
        $this->importJobOffers = $importJobOffers;
    }

    public function index()
    {
        // non-good-code only for viewing purposes. Good code is in app/Console/Commands/ImportJobOffers.php
        print_r("<pre>");
        print_r(strtoupper('Brzydkie Wyświetlanie tylko dla celów sprawdzenia czy się zaimportowało. Sprawdzanie kodu należy zacząć od przeczytania pliku readme.md i przejrzenia kodu: app/Console/Commands/ImportJobOffers.php'));
        print_r("</pre>");
        $jobOffers = JobOffer::with('cities')->get();
        if (count($jobOffers) > 0) {
            foreach ($jobOffers as $jobOffer) {
                print_r("<pre>");
                print_r('Tytuł oferty: ' . $jobOffer->title);
                print_r("</pre>");
                print_r("<pre>");
                print_r('miasta, których dotyczy oferta:');
                print_r("</pre>");
                foreach ($jobOffer->cities as $city) {
                    print_r("<pre>");
                    print_r($city->name . ', ');
                    print_r("</pre>");
                }
            }
        } else {
            print_r("<pre>");
            print_r('Jeszcze nie ma zaimportowanych ofert pracy.');
            print_r("</pre>");
        }

        return view('welcome');
    }

}
