<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @ORM\OneToMany(targetEntity=UserMessage::class, mappedBy="user")
     */
    private $userMessages;

    /**
     * @ORM\OneToMany(targetEntity=Friend::class, mappedBy="user")
     */
    private $friends;

    public function __construct() {
        $this->userMessages = new ArrayCollection();
        $this->friends = new ArrayCollection();
    }


    public function getId(): ?int{
        return $this->id;
    }

    public function getLogin(): ?string{
        return $this->login;
    }

    public function setLogin(string $login): self{
        $this->login = $login;
        return $this;
    }

    public function getEmail(): ?string{
        return $this->email;
    }

    public function setEmail(string $email): self{
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string{
        return $this->password;
    }

    public function setPassword(string $password): self{
        $this->password = $password;
        return $this;
    }

    public function getRole(): ?string{
        return $this->role;
    }

    public function setRole(string $role): self{
        $this->role = $role;
        return $this;
    }

    public function getImage(): ?string{
        return $this->image;
    }

    public function setImage(?string $image): self{
        $this->image = $image;
        return $this;
    }

    public function getActif(): ?bool{
        return $this->actif;
    }

    public function setActif(?bool $actif): self{
        $this->actif = $actif;
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
            $userMessage->setUser($this);
        }
        return $this;
    }

    public function removeUserMessage(UserMessage $userMessage): self{
        if ($this->userMessages->removeElement($userMessage)) {
            // set the owning side to null (unless already changed)
            if ($userMessage->getUser() === $this) {
                $userMessage->setUser(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|Friend[]
     */
    public function getFriends(): Collection
    {
        return $this->friends;
    }

    public function addFriend(Friend $friend): self
    {
        if (!$this->friends->contains($friend)) {
            $this->friends[] = $friend;
            $friend->setUser($this);
        }

        return $this;
    }

    public function removeFriend(Friend $friend): self
    {
        if ($this->friends->removeElement($friend)) {
            // set the owning side to null (unless already changed)
            if ($friend->getUser() === $this) {
                $friend->setUser(null);
            }
        }

        return $this;
    }



    
}
