<?php

namespace App\Entity;

use App\Repository\FriendRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FriendRepository::class)
 */
class Friend{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $relation_date;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="friends")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="friends")
     */
    private $friend;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;


    public function getId(): ?int{
        return $this->id;
    }

    public function getFriendDate(): ?string{
        return $this->relation_date;
    }

    public function setFriendDate(string $relation_date): self{
        $this->relation_date = $relation_date;
        return $this;
    }

    public function getUser(): ?user{
        return $this->user;
    }

    public function setUser(?user $user): self{
        $this->user = $user;
        return $this;
    }

    public function getFriend(): ?user{
        return $this->friend;
    }

    public function setFriend(?user $friend): self{
        $this->friend = $friend;
        return $this;
    }

    public function getStatus(): ?string{
        return $this->status;
    }

    public function setStatus(string $status): self{
        $this->status = $status;
        return $this;
    }

}
