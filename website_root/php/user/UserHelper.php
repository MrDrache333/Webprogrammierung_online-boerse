<?php


namespace php\user;

use PDORow;
use PDOStatement;

/**
 * Helpermethods to Convert between Formats etc.
 * @package php\User
 */
class UserHelper
{

    /**
     * Converts an entire SQL-Result-Set to a User-Array
     * @param $result PDOStatement
     * @return User|array|null
     */
    public static function getUsersFromSQLResult($result)
    {
        $users = [];
        if ($result !== null && !is_bool($result)) {
            foreach ($result as $row) {
                $user = self::getUserFromSQLResultRow($row);
                if ($user !== null) {
                    $users[] = $user;
                }
            }
            if (sizeof($users) === 1) {
                return current($users);
            }
            if (sizeof($users) === 0) {
                return null;
            }
            return $users;
        }
        return null;
    }

    /**
     * Converts one SQL-Result-Row to a User-Object
     * @param $result PDORow
     * @return User|null
     */
    private static function getUserFromSQLResultRow($result): ?User
    {
        $user = new User();
        $user->setId($result['id'] ?? null);
        if ($user->getId() === null) return null;
        $user->setEmail($result['email'] ?? null);
        $user->setPrename($result['prename'] ?? null);
        $user->setSurname($result['surname'] ?? null);
        $user->setPassword(md5($result['password'] ?? null));
        return $user;
    }

}