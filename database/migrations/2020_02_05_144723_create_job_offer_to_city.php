<?php

use App\Model\PivotJobOfferToCity;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOfferToCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(PivotJobOfferToCity::TABLE_NAME, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_offer_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(PivotJobOfferToCity::TABLE_NAME);
    }
}
