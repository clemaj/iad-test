<?php
declare(strict_types=1);

namespace App\RealEstate\Discovering\Property\Entities\Property;

interface PropertyRepositoryInterface
{
    public function add(Property $property): void;

    public function get(int $uid, int $advisorId): ?Property;
}
