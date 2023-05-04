<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class UserLevelEnum extends Enum
{
    public const MEMBER = 0;
    public const VIP_MEMBER = 1;
    public const ADMIN = 2;
    public const MANAGER = 3;
    public const BOSS = 4;

    public static function getArrayView():array
    {
        return [
            'Member' => self::MEMBER,
            'Vip Member' => self::VIP_MEMBER,
            'Admin' => self::ADMIN,
            'Manager' => self::MANAGER,
            'Boss' => self::BOSS,
        ];
    }

    public static function getKeyByValue($value):string
    {
        return array_search($value,self::getArrayView(),true);
    }
}
