<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 14.12.2021
 * @time: 12:53
 */

namespace mhunesi\hepsijet\service;

use yii\base\BaseObject;

class CompanyLimitService extends BaseService
{
    /**
     * @return BaseService
     */
    public function findLimitByCompany()
    {
        return $this->get('companyLimit/findLimitByCompany');
    }
    
}