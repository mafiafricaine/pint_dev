<?php

namespace App\Entity;

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
     * @ORM\Column(type="datetime_immutable", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $updatedAt;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @ORM\PrePersist   //cette methode on veut l'appeler avant un persist (avant creation d'un pin on appel)
     * @ORM\PreUpdate    //cette methode on veut l'appeler avant un update (avant la modification d'un pin)
    */
          public function updateTimestamps(){
            if ($this->getCreatedAt()=== null){
                    $this->setCreatedAt(new \DateTimeImmutable); //DateTimeImmutable, cest qu'on ne peut pas modifier
            }
            $this->setUpdatedAt(new \DateTimeImmutable);
          }

}
