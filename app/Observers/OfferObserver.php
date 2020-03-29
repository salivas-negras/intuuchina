<?php

namespace App\Observers;

use App\Offer;
use Carbon\Carbon;

class OfferObserver
{
    /**
     * Handle the offer "created" event.
     *
     * @param  \App\Offer  $offer
     * @return void
     */
    public function created(Offer $offer)
    {
        //
    }

    /**
     * Handle the offer "updated" event.
     *
     * @param  \App\Offer  $offer
     * @return void
     */
    public function updated(Offer $offer)
    {
        //
    }

    /**
     * Handle the offer "deleted" event.
     *
     * @param  \App\Offer  $offer
     * @return void
     */
    public function deleted(Offer $offer)
    {
        //
    }

    /**
     * Handle the offer "restored" event.
     *
     * @param  \App\Offer  $offer
     * @return void
     */
    public function restored(Offer $offer)
    {
        //
    }

    /**
     * Handle the offer "force deleted" event.
     *
     * @param  \App\Offer  $offer
     * @return void
     */
    public function forceDeleted(Offer $offer)
    {
        //
    }

    /**
     * Handle the offer "retrieved" event.
     *
     * @param  \App\Offer  $offer
     * @return void
     */
    public function retrieved(Offer $offer) {
//        $offer->updated_at = $this->humanDateFormat($offer);
    }

    private function humanDateFormat(Offer $offer) {
        return Carbon::parse($offer->created_at)->diffForHumans(Carbon::now());
    }
}
