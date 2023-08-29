<?php

declare(strict_types=1);

namespace App\Models\Organization\Converter;

use App\Models\Organization\Organization;
use Spatie\ArrayToXml\ArrayToXml;

final class ArrayXmlConverter
{
    public function __invoke(array $organizations): string
    {
        $xmlData = [];

        /** @var Organization $organization */
        foreach ($organizations as $organization) {
            $xmlData['organizations']['organization'][] = [
                '_attributes' => ['ogrn' => $organization->ogrn],
                'orgname' => $organization->name,
                'address' => [
                    '_attributes' => ['index' => $organization->address->index],
                    'city' => $organization->address->city,
                    'street' => $organization->address->street,
                ],
            ];
        }

        return ArrayToXml::convert($xmlData);
    }
}
