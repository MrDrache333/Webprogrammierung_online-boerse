<?php


namespace php\chat;


class ChatMessage
{

    private $id;
    private $sender;
    private $receiver;
    private $message;
    private $time;

    /**
     * ChatMessage constructor.
     * @param $id
     * @param $sender
     * @param $receiver
     * @param $message
     * @param $time
     */
    public function __construct($id, $sender, $receiver, $message, $time)
    {
        $this->id = $id;
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->message = $message;
        $this->time = $time;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender($sender): void
    {
        $this->sender = $sender;
    }

    /**
     * @return mixed
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param mixed $receiver
     */
    public function setReceiver($receiver): void
    {
        $this->receiver = $receiver;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time): void
    {
        $this->time = $time;
    }


}