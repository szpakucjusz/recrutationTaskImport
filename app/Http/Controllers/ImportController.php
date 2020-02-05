<?php
namespace App\Http\Controllers;

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
        $this->importJobOffers->import();
        return view('welcome');
    }

}
