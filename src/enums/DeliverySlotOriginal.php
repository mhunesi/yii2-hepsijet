<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 30.12.2021
 * @time: 12:08
 */

namespace mhunesi\hepsijet\enums;

class DeliverySlotOriginal extends BaseEnum
{
    /**
     * Slot Off
     */
    public const SLOT_OFF = 0;

    /**
     * Morning 09:00 - 13:00
     */
    public const SLOT1 = 1;

    /**
     * Noon 13:00 - 18:00
     */
    public const SLOT2 = 2;

    /**
     * Evening 18:00 - 23:00
     */
    public const SLOT3 = 3;

}