<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserGenderEnum extends Enum
{
    public const FEMALE = 0;
    public const MALE = 1;
    public const OTHER = 2;

    public static function getArrayView(): array
    {
        return [
            'Male' => self::MALE,
            'Female' => self::FEMALE,
            'Other' => self::OTHER,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }
}
