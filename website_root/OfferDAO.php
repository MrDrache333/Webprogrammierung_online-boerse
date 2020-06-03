<?php


/**
 * Interface OfferDAO
 */
interface OfferDAO
{

    /**
     * @param Offer $offer
     * @return mixed
     */
    public function create(Offer $offer);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param Offer $offer
     * @return mixed
     */
    public function update(Offer $offer);

}