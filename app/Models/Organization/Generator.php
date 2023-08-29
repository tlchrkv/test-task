<?php

declare(strict_types=1);

namespace App\Models\Organization;

final class Generator
{
    public function __invoke(int $count): array
    {
        $organizations = [];
        for ($i = 0; $i <= $count; $i++) {
            $organizations[] = new Organization(
                $this->generateOgrn(),
                $this->generateOrganizationName(),
                new Address(
                    $this->generateAddressIndex(),
                    $this->generateCityName(),
                    $this->generateStreetAddress()
                )
            );
        }

        return $organizations;
    }

    private function generateOgrn(): int
    {
        return mt_rand(1000000000000, 9999999999999);
    }

    private function generateOrganizationName(): string
    {
        $words = ['Гриль', 'Ди', 'Бо', 'Компания', 'Кафе', 'Арт', 'М', 'Ко'];

        return $words[mt_rand(0, count($words) - 1)] . ' ' . $words[mt_rand(0, count($words) - 1)];
    }

    private function generateCityName(): string
    {
        return 'Москва';
    }

    private function generateStreetAddress(): string
    {
        $streets = [
            'Бабаевская улица',
            'Бабьегородский 1-й, переулок',
            'Бабьегородский 2-й, переулок',
            'Багратион, мост',
            'Багратионовский проезд',
            'Багрицкого, улица',
            'Баженова, улица',
        ];

        return $streets[mt_rand(0, count($streets) - 1)];
    }

    private function generateAddressIndex(): int
    {
        return mt_rand(100000, 999999);
    }
}
