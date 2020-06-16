<?php


namespace php\address;

use PDORow;
use PDOStatement;

/**
 * Helpermethods to Convert between Formats etc.
 * @package php\address
 */
class AddressHelper
{

    /**
     * Converts an entire SQL-Result-Set to a Address-Array
     * @param $result PDOStatement The SQL-Result
     * @return Address|array|null
     */
    public static function getAddressFromSQLResult($result)
    {
        $addresses = [];
        if ($result !== null && !is_bool($result)) {
            foreach ($result as $row) {
                $address = self::getaddressFromSQLResultRow($row);
                if ($address !== null) {
                    $addresses[] = $address;
                }
            }
            if (sizeof($addresses) === 0) {
                return null;
            }
            return $addresses;
        }
        return null;
    }

    /**
     * Converts one SQL-Result-Row to a address-Object
     * @param $result PDORow The SQL-Result Row-Array
     * @return Address|null
     */
    private static function getaddressFromSQLResultRow($result): ?address
    {
        if ($result['id'] === null) {
            return null;
        }
        return new address(
            $result['id'] ?? null,
            $result['state'] ?? null,
            $result['town'] ?? null,
            $result['street'] ?? null,
            $result['number'] ?? null,
            $result['plz'] ?? null
        );
    }

}