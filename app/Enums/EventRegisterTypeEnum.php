<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class EventRegisterTypeEnum extends Enum
{
    public const NOT_IN_CLUB = 0;
    public const IN_CLUB = 1;
    public const UNKNOWN = 2;

    public static function getArrayView(): array
    {
        return [
            'Not In Club' => self::NOT_IN_CLUB,
            'In Club' => self::IN_CLUB,
            'Unknown' => self::UNKNOWN,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }
}
