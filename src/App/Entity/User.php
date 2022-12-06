<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'users')]
class User {
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    protected int $id;

    #[ORM\Column(type: 'string', length: 50 )]
    protected string $firstName;

    #[ORM\Column(type: 'string', length: 50)]
    protected string $lastName;

    #[ORM\Column(type: 'string', unique: true)]
    protected string $email;

    #[ORM\Column(type: 'string', length: 50)]
    protected string $password;

    #[ORM\Column(type: 'string', length: 50)]
    protected string $address;

    #[ORM\Column(type: 'string', length: 50)]
    protected string $city;

    #[ORM\Column(type: 'string', length: 50)]
    protected string $zipCode;

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): User {
        $this->id = $id;

        return $this;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): User {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function setLastName(string $lastName): User {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): User {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): User {
        $this->password = $password;

        return $this;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function setAddress(string $address): User {
        $this->address = $address;

        return $this;
    }

    public function getCity(): string {
        return $this->city;
    }

    public function setCity(string $city): User {
        $this->city = $city;

        return $this;
    }

    public function getzipCode(): string {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): User {
        $this->zipCode = $zipCode;

        return $this;
    }
}
