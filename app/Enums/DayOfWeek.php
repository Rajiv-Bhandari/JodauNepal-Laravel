<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Sunday()
 */
final class DayOfWeek extends Enum
{
    const Sunday = 1;
    const Monday = 2;
    const Tuesday = 3;
    const Wednesday = 4;
    const Thursday = 5;
    const Friday = 6;
    const Saturday = 7;

    public static function asAssociativeArray(): array
    {
        return [
            self::Sunday => 'Sunday',
            self::Monday => 'Monday',
            self::Tuesday => 'Tuesday',
            self::Wednesday => 'Wednesday',
            self::Thursday => 'Thursday',
            self::Friday => 'Friday',
            self::Saturday => 'Saturday',
        ];
    }
}
