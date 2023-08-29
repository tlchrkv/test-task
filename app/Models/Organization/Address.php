<?php

declare(strict_types=1);

namespace App\Models\Organization;

final class Address
{
    public function __construct(
        public readonly int $index,
        public readonly string $city,
        public readonly string $street,
    ) {}
}
