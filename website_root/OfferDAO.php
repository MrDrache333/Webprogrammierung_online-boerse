<?php


/**
 * Interface OfferDAO
 */
interface OfferDAO
{
    /**
     * @param $what
     * @param $where
     * @param $type
     * @param $duration
     * @param $time
     * @return mixed
     */
    public function search($what, $where, $type, $duration, $time);

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