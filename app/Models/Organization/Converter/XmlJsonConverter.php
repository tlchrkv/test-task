<?php

declare(strict_types=1);

namespace App\Models\Organization\Converter;

use Mtownsend\XmlToArray\XmlToArray;

final class XmlJsonConverter
{
    public function __invoke(string $xml): string
    {
        $array = XmlToArray::convert($xml);

        $this->validateXmlArray($array);

        $json = [];
        foreach ($array['organizations']['organization'] as $organization) {
            $index = $organization['address']['@attributes']['index'];
            $address = $index . ' ' . $organization['address']['city'] . ', ' . $organization['address']['street'];
            $json[$organization['@attributes']['ogrn']] = $organization['orgname'] . ' - ' . $address;
        }

        return json_encode($json);
    }

    private function validateXmlArray(array $array): void
    {
        switch (false) {
            case array_key_exists('organizations', $array):
            case array_key_exists('organization', $array['organizations']):
                throw new InvalidFormatError();
        }

        foreach ($array['organizations']['organization'] as $organization) {
            switch (false) {
                case array_key_exists('address', $organization):
                case array_key_exists('@attributes', $organization['address']):
                case array_key_exists('index', $organization['address']['@attributes']):
                case array_key_exists('city', $organization['address']):
                case array_key_exists('street', $organization['address']):
                case array_key_exists('@attributes', $organization):
                case array_key_exists('ogrn', $organization['@attributes']):
                case array_key_exists('orgname', $organization):
                    throw new InvalidFormatError();
            }
        }
    }
}
