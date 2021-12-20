<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 16.12.2021
 * @time: 13:05
 */

namespace mhunesi\hepsijet\service;

/**
 * SettlementService
 */
class SettlementService extends BaseService
{
    /**
     * @return SettlementService
     */
    public function cities()
    {
        return $this->get('/settlement/cities');
    }

    /**
     * @param $id
     * @return SettlementService
     */
    public function towns($id)
    {
        return $this->get("/settlement/city/{$id}/towns");
    }

    /**
     * @param $id
     * @return SettlementService
     */
    public function districts($id)
    {
        return $this->get("/settlement/town/{$id}/districts");
    }
}