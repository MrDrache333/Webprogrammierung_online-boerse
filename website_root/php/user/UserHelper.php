<?php


namespace php\User;

use mysqli_result;

/**
 * Helpermethods to Convert between Formats etc.
 * @package php\User
 */
class UserHelper
{

    /**
     * Converts an entire SQL-Result-Set to a User-Array
     * @param $result mysqli_result The SQL-Result
     * @return User|array|null
     */
    public static function getUsersFromSQLResult($result)
    {
        $users = [];
        if ($result !== null && !is_bool($result)) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
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
     * @param $result array The SQL-Result Row-Array
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
        $user->setPassword($result['password'] ?? null);
        $user->setGender($result['gender'] ?? null);

        return $user;
    }

}