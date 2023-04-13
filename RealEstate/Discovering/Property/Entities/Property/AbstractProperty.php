<?php
declare(strict_types=1);

namespace App\RealEstate\Discovering\Property\Entities\Property;

use Doctrine\ORM\Mapping as ORM;

abstract class AbstractProperty
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column("type"="integer")
     */
    private int $id;

    /**
     * @ORM\Column("type"="text", nullable=true)
     */
    private string|null $description;

    public function getId(): int
    {
        return $this->id;
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
}
