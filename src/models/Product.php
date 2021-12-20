<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 14.12.2021
 * @time: 17:40
 */

namespace mhunesi\hepsijet\models;

use yii\base\Model;

class Product extends Model
{
    /**
     * @var Product Code
     * Values:
     * HX_STD	> Standart	Plus Delivery
     * HX_SD	> Samde Day Delivery
     * HX_ND	> Next Day Delivery
     * HX_EX	> Express Delivery
     * HX_VIP1	> VIP Delivery in 1 Hour
     * HX_VIP2	> VIP Delivery in 2 Hours
     * HX_RND	> Appointed delivery
     * HX_CC	> Click&Collect Delivery
     */
    public $productCode;
}