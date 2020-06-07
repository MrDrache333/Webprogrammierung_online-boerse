<?php

namespace php\offer;

/**
 * Interface OfferDAO
 */
interface OfferDAO
{
    /**
     * @param String $what Suchbegriff
     * @param String $where PLZ oder Ort
     * @param int $type JobTyp
     * @param int $duration Beschäftigungsdauer
     * @param int $time Arbeitszeitmodell
     * @return mixed
     */
    public function search($what, $where, $type, $duration, $time);

    /**
     * @param Offer $offer Angebot
     * @return mixed
     */
    public function create(Offer $offer);

    /**
     * @param int $id Angebotsid
     * @return mixed
     */
    public function delete($id);

    /**
     * @param Offer $offer
     * @return mixed
     */
    public function update(Offer $offer);

}