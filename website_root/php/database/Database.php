<?php

namespace php\database;

/**
 * Interface Database
 * @package php\database
 */
interface Database
{
    /**
     * @return bool|null
     */
    public function exists(): ?bool;

    /**
     * @return bool|null
     */
    public function create(): ?bool;

    /**
     * @return bool|null
     */
    public function connect(): ?bool;

    /**
     * @return bool|null
     */
    public function disconnect(): ?bool;

    /**
     * @param $command String Auszuführender Befehl
     * @param $values array Zu übergebene Parameter
     * @return mixed
     */
    public function execute($command, $values);

    /**
     * @param $command
     * @return mixed
     */
    public function query($command);

}