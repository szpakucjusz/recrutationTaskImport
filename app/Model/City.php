<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public const TABLE_NAME = 'city';
    protected $table = self::TABLE_NAME;

    public function JobOffers()
    {
        return $this->belongsToMany('App\Model\JobOffer', PivotJobOfferToCity::TABLE_NAME, 'city_id', 'job_offer_id');
    }

}
