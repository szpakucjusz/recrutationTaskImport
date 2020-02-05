<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    public const TABLE_NAME = 'job_offer';
    protected $table = self::TABLE_NAME;

    protected $fillable = ['title'];

    public function cities()
    {
        return $this->belongsToMany('App\Model\City', PivotJobOfferToCity::TABLE_NAME, 'job_offer_id', 'city_id');
    }
}
