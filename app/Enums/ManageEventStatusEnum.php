<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ManageEventStatusEnum extends Enum
{
    public const Reject = 0;
    public const Approve = 1;

    public static function getArrayView(): array
    {
        return [
            'Reject' => self::Reject,
            'Approve' => self::Approve,
        ];
    }

    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }
}
