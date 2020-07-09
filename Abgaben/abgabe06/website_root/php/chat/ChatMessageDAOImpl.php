<?php


namespace php\chat;


use php\database\Database;
use php\user\User;

class ChatMessageDAOImpl implements ChatMessageDAO
{
    /**
     * @var Database Datenbank
     */
    private $database;

    /**
     * OfferController constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    /**
     * @inheritDoc
     */
    public function create(ChatMessage $chatMessage)
    {
        $command = "insert into chatMessage(sender, receiver, message)  values (?,?,?)";
        $values = [$chatMessage->getSender(), $chatMessage->getReceiver(), $chatMessage->getMessage()];
        return $this->database->execute($command, $values) !== null;
    }

    public function delete($id)
    {
        $command = "DELETE FROM chatMessage WHERE ID=?";
        return $this->database->execute($command, [$id]);
    }

    public function update(ChatMessage $chatMessage)
    {
        // TODO: Implement update() method.
    }

    public function findChatMessageId(ChatMessage $chatMessage)
    {
        $command = "SELECT * FROM chatMessage WHERE sender=? AND receiver=? AND message=? AND time=?";
        $values = [$chatMessage->getSender(), $chatMessage->getReceiver(), $chatMessage->getMessage(), $chatMessage->getTime()];
        return ChatMessageHelper::getchatMessageFromSQLResult($this->database->execute($command, $values));
    }

    public function getChatMessagesforUser(User $user)
    {
        $command = "SELECT * FROM chatMessage WHERE sender=? OR receiver=?";
        $values = [$user->getId(), $user->getId()];
        return ChatMessageHelper::getchatMessageFromSQLResult($this->database->execute($command, $values));
    }
}