<?php

namespace App\Entity;

use App\Repository\UserMessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserMessageRepository::class)
 */
class UserMessage{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userMessages")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Message::class, inversedBy="userMessages")
     */
    private $message;

    
    public function getId(): ?int{
        return $this->id;
    }

    public function getUser(): ?user {
        return $this->user;
    }

    public function setUser(?user $user): self {
        $this->user = $user;
        return $this;
    }

    public function getMessage(): ?message{
        return $this->message;
    }

    public function setMessage(?message $message): self{
        $this->message = $message;
        return $this;
    }
}
