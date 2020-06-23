<?php


namespace php\chat;

use PDORow;
use PDOStatement;

/**
 * Helpermethods to Convert between Formats etc.
 * @package php\chatMessage
 */
class ChatMessageHelper
{

    /**
     * Converts an entire SQL-Result-Set to a chatMessage-Array
     * @param $result PDOStatement The SQL-Result
     * @return ChatMessage|array|null
     */
    public static function getchatMessageFromSQLResult($result)
    {
        $chatMessagees = [];
        if ($result !== null && !is_bool($result)) {
            foreach ($result as $row) {
                $chatMessage = self::getchatMessageFromSQLResultRow($row);
                if ($chatMessage !== null) {
                    $chatMessagees[] = $chatMessage;
                }
            }
            if (sizeof($chatMessagees) === 0) {
                return null;
            }
            return $chatMessagees;
        }
        return null;
    }

    /**
     * Converts one SQL-Result-Row to a chatMessage-Object
     * @param $result PDORow The SQL-Result Row-Array
     * @return chatMessage|null
     */
    private static function getchatMessageFromSQLResultRow($result): ?chatMessage
    {
        if ($result['ID'] === null) {
            return null;
        }
        return new chatMessage(
            $result['id'] ?? null,
            $result['sender'] ?? null,
            $result['receiver'] ?? null,
            $result['message'] ?? null,
            $result['time'] ?? null
        );
    }

}