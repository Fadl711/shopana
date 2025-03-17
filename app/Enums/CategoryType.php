<?php

namespace App\Enums;

enum CategoryType: string
{
    case MEN = 'men';
    case WOMEN = 'women';
    case GIRLS = 'girls';
    case BOYS = 'boys';
    case NEWBORN = 'newborn';
    case ACCESSORIES  = 'accessories';
    case NUTS = 'nuts';

    public function label(): string
    {
        return match($this) {
            self::MEN => 'رجالي',
            self::WOMEN => 'نسائي',
            self::GIRLS => 'بناتي',
            self::BOYS => 'ولادي',
            self::NEWBORN => 'المواليد',
            self::ACCESSORIES => 'العطور والاكسسوارات',
            self::NUTS => 'المكسرات',
        };
    }

    public static function getAll(): array
    {
        return [
            self::MEN,
            self::WOMEN,
            self::GIRLS,
            self::BOYS,
            self::NEWBORN,
            self::ACCESSORIES,
            self::NUTS,
        ];
    }
}
