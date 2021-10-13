<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\PinRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PinRepository::class)
 * @ORM\Table(name="pin")
 * @ORM\HasLifecycleCallbacks 
 */
class Pin
{
    use Timestampable;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Votre titre doit avoir un nom")
     * @Assert\Length(min=3, minMessage="Vous devez avoir un titre de minimium 3 caractères")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Votre description doit avoir un texte")
     * @Assert\Length(min=10, minMessage="Vous devez avoir une description de minimium 10 caractères")
     */
    private $description;

   

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="pins")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }


          public function getImageName(): ?string
          {
              return $this->imageName;
          }

          public function setImageName(?string $imageName): self
          {
              $this->imageName = $imageName;

              return $this;
          }

          public function getUser(): ?User
          {
              
              return $this->user;
          }

          public function setUser(?User $user): self
          {
              $this->user = $user;

              return $this;
          }

}
