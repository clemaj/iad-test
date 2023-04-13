<?php

declare(strict_types=1);

namespace App\RealEstate\Discovering\Property\UseCases\Property\AddPropertyForAdvisor;

class AddPropertyForAdvisorRequest
{
    private int $uid;

    private int $advisorId;

    private string $url;

    private float $price;

    public function __construct(int $uid, int $advisorId, string $url, float $price)
    {
        $this->uid = $uid;
        $this->advisorId = $advisorId;
        $this->url = $url;
        $this->price = $price;
    }

    public function getUid(): int
    {
        return $this->uid;
    }

    public function getAdvisorId(): int
    {
        return $this->advisorId;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
