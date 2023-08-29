<?php

declare(strict_types=1);

namespace App\Models\Organization;

final class Organization
{
    public function __construct(
        public readonly int $ogrn,
        public readonly string $name,
        public readonly Address $address
    ) {}
}
