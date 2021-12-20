<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 14.12.2021
 * @time: 17:00
 */

namespace mhunesi\hepsijet\models;

use yii\base\Model;

class Company extends Model
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $abbreviationCode;
}