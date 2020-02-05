<?php

namespace App\Console\Commands;

use App\Repositories\Contracts\ImportJobOffersInterface;
use Illuminate\Console\Command;

class ImportJobOffers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:job_offers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    /**
     * @var ImportJobOffersInterface
     */
    private $importJobOffers;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ImportJobOffersInterface $importJobOffers)
    {
        parent::__construct();
        $this->importJobOffers = $importJobOffers;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->importJobOffers->import();
    }
}
