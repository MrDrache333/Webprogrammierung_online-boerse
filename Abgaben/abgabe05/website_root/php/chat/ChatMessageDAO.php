<?php


namespace php\chat;


use php\user\User;

interface ChatMessageDAO
{

    /**
     * @param ChatMessage $chatMessage
     * @return mixed
     */
    public function create(ChatMessage $chatMessage);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param ChatMessage $chatMessage
     * @return mixed
     */
    public function update(ChatMessage $chatMessage);

    /**
     * @param ChatMessage $chatMessage
     * @return mixed
     */
    public function findChatMessageId(ChatMessage $chatMessage);

    /**
     * @param User $user
     * @return mixed
     */
    public function getChatMessagesforUser(User $user);

}