<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PivotJobOfferToCity extends Pivot
{
    public $incrementing = true;

    public const TABLE_NAME = 'pivot_job_offer_to_city';
    protected $table = self::TABLE_NAME;
}
