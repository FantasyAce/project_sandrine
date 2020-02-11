<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File as File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 * @Vich\Uploadable
 */
class Media
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $AddedAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="media_image", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInCarousel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $placeCarousel;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAddedAt(): ?\DateTimeInterface
    {
        return $this->AddedAt;
    }

    public function setAddedAt(?\DateTimeInterface $AddedAt): self
    {
        $this->AddedAt = $AddedAt;

        return $this;
    }


    public function setImageFile(?File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->AddedAt = new \DateTimeImmutable;
        }
    }

    public function getImageFile():? File
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getIsInCarousel(): ?bool
    {
        return $this->isInCarousel;
    }

    public function setIsInCarousel(?bool $isInCarousel): self
    {
        $this->isInCarousel = $isInCarousel;

        return $this;
    }

    public function getPlaceCarousel(): ?int
    {
        return $this->placeCarousel;
    }

    public function setPlaceCarousel(?int $placeCarousel): self
    {
        $this->placeCarousel = $placeCarousel;

        return $this;
    }
}