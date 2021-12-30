<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 30.12.2021
 * @time: 15:09
 */

namespace mhunesi\hepsijet\enums;

class IntegrationStatus extends BaseEnum
{
    public const NEO = 'NEO';

    public const ACCEPTED = 'ACCEPTED';

    public const DELIVERED = 'DELIVERED';

    public const DELETED = 'DELETED';

    public const CANCELLED = 'CANCELLED';

    public const RETURNED = 'RETURNED';

    public const OUT_FOR_DELIVERY = 'OUT_FOR_DELIVERY';

    public const FAILED_ATTEMPT = 'FAILED_ATTEMPT';

    public static $list = [
        self::NEO => 'Request received',
        self::ACCEPTED => 'Delivery accepted',
        self::DELIVERED => 'Delivered',
        self::DELETED => 'Deleted',
        self::CANCELLED => 'Cancelled',
        self::RETURNED => 'Returned',
        self::OUT_FOR_DELIVERY => 'Delivery returned to customer',
        self::FAILED_ATTEMPT => 'Delivery attempt failed'
    ];

}