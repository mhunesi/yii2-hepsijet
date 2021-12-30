<?php

namespace mhunesi\hepsijet\enums;

/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 30.12.2021
 * @time: 10:49
 */
class ProductCode extends BaseEnum
{
    /**
     * Standard Plus Delivery
     */
    public const HX_STD = 'HX_STD';

    /**
     * Same Day Delivery
     */
    public const HX_SD = 'HX_SD';

    /**
     * Next Day Delivery
     */
    public const HX_ND = 'HX_ND';

    /**
     * Express Delivery
     */
    public const HX_EX = 'HX_EX';

    /**
     * VIP Delivery in 1 Hour
     */
    public const HX_VIP1 = 'HX_VIP1';

    /**
     * VIP Delivery in 2 Hours
     */
    public const HX_VIP2 = 'HX_VIP2';

    /**
     * Appointed delivery
     */
    public const HX_RND = 'HX_RND';

    /**
     * Click & Collect Delivery
     */
    public const HX_CC = 'HX_CC';

    /**
     * 2 Hours Delivery
     */
    public const _2HOURS = '2HOURS';

}