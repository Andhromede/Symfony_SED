<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="string")
     */
    private $post_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $message_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $sender_id;

    /**
     * @ORM\OneToMany(targetEntity=UserMessage::class, mappedBy="message")
     */
    private $userMessages;


    public function __construct(){
        $this->userMessages = new ArrayCollection();
    }

    public function getId(): ?int{
        return $this->id;
    }

    public function getText(): ?string{
        return $this->text;
    }

    public function setText(string $text): self{
        $this->text = $text;
        return $this;
    }

    public function getPostDate(): string{
        return $this->post_date;
    }

    public function setPostDate(string $post_date): self{
        $this->post_date = $post_date;
        return $this;
    }

    public function getMessageId(): ?int{
        return $this->message_id;
    }

    public function setMessageId(?int $message_id): self{
        $this->message_id = $message_id;
        return $this;
    }

    public function getSenderId(): ?int{
        return $this->sender_id;
    }

    public function setSenderId(int $sender_id): self{
        $this->sender_id = $sender_id;
        return $this;
    }

    /**
     * @return Collection|UserMessage[]
     */
    public function getUserMessages(): Collection{
        return $this->userMessages;
    }

    public function addUserMessage(UserMessage $userMessage): self{
        if (!$this->userMessages->contains($userMessage)) {
            $this->userMessages[] = $userMessage;
            $userMessage->setMessage($this);
        }
        return $this;
    }

    public function removeUserMessage(UserMessage $userMessage): self{
        if ($this->userMessages->removeElement($userMessage)) {
            // set the owning side to null (unless already changed)
            if ($userMessage->getMessage() === $this) {
                $userMessage->setMessage(null);
            }
        }
        return $this;
    }

    
}
