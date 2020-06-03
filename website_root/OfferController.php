<?php


class OfferController implements OfferDAO
{
    /**
     * @var Database Datenbank
     */
    private $database;

    /**
     * OfferController constructor.
     */
    public function __construct()
    {
        $this->database = new Database();
        try {
            $this->database->connect();
        } catch (\mysql_xdevapi\Exception $e) {
            print $e->getMessage();
        }
    }


    /**
     * @inheritDoc
     */
    public function create(Offer $offer)
    {
        //TODO Address-ID?
        $command = "insert into offers values (" .
            $offer->getTitle() . "," .
            $offer->getSubTitle() . "," .
            $offer->getDescription() . "," .
            $offer->getLogo() . "," .
            $offer->getAddress()->getId() . "," .
            $offer->getCreated() . "," .
            $offer->getFree() . "," .
            ")";
        return $this->database->execute($command) !== null;
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        $command = "DELETE FROM offers WHERE id like '" . $id . "'";
        return $this->database->execute($command);
    }

    /**
     * @inheritDoc
     */
    public function update(Offer $offer)
    {
        // TODO: Implement update() method.
    }
}