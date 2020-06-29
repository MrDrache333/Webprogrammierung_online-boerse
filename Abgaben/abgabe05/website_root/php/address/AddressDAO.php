<?php

namespace php\address;

/**
 * Interface AddressDAO
 */
interface AddressDAO
{

    /**
     * @param Address $address
     * @return mixed
     */
    public function create(Address $address);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param Address $address
     * @return mixed
     */
    public function update(Address $address);

    /**
     * @param Address $address
     * @return mixed
     */
    public function findAddressId(Address $address);

}