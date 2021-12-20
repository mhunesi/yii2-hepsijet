<?php

namespace mhunesi\hepsijet\models;

use yii\base\Model;

/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 14.12.2021
 * @time: 12:52
 */
class Receiver extends Model
{
    /**
     * @var string
     * Her yeni adres için benzersiz olmalıdır. recipientAddress alanındaki "companyAddressId" ile aynı gönderilebilir.
     * Adres hatalarını önlemek adına başına firma kodu eklenmesi tavsiye edilir. Örnek:KTPM10192121
     */
    public $companyCustomerId;

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string
     */
    public $phone1;

    /**
     * @var string
     */
    public $email;

}