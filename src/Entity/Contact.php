<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     * @Groups("contact:read")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner le nom")
     * @Assert\Length(min=2, max=25, minMessage="Le nom doit avoir au moins {{ limit }} caractères", maxMessage="Le nom ne doit pas dépasser {{ limit }} caractères")
     * @ORM\Column(type="string", length=255)
     * @var string
     * @Groups("contact:read")
     */
    private $lastname;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner le prénom")
     * @Assert\Length(min=2, max=25, minMessage="Le prénom doit avoir au moins {{ limit }} caractères", maxMessage="Le prénom ne doit pas dépasser {{ limit }} caractères")
     * @ORM\Column(type="string", length=255)
     * @var string
     * @Groups("contact:read")
     */
    private $firstname;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner le numéro de téléphone")
     * @Assert\Length(min=8, max=12, minMessage="Le numéro de téléphone doit avoir au moins {{ limit }} chiffres", maxMessage="Le numéro de téléphone ne doit pas dépasser {{ limit }} chiffres")
     * @ORM\Column(type="string", length=14)
     * @var string
     * @Groups("contact:read")
     */
    private $phone;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner l'email")
     * @Assert\Email()
     * @ORM\Column(type="string", length=255)
     * @var string
     * @Groups("contact:read")
     */
    private $mail;

    /**
     * @Assert\NotBlank(message="Veuillez rédiger votre message")
     * @Assert\Length(min=8, max=1200, minMessage="Le message doit avoir au moins {{ limit }} caractères", maxMessage="Le message ne doit pas dépasser {{ limit }} caractères")
     * @ORM\Column(type="text")
     * @var string
     * @Groups("contact:read")
     */
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
