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
     * @ORM\Column(type="date", nullable=true)
     */
    private $friend_date;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="friends")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="friends")
     */
    private $friend;


    public function getId(): ?int{
        return $this->id;
    }

    public function getFriendDate(): ?\DateTimeInterface{
        return $this->friend_date;
    }

    public function setFriendDate(?\DateTimeInterface $friend_date): self{
        $this->friend_date = $friend_date;
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

}
