<?php

namespace App\Entity\Traits;

trait Timestampable
{
    /**
     * @ORM\Column(type="datetime_immutable", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $updatedAt;

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
