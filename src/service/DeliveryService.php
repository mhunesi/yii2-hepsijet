<?php

namespace mhunesi\hepsijet\service;

use GuzzleHttp\Client;
use mhunesi\hepsijet\models\Cargo;

/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 14.12.2021
 * @time: 12:39
 */
class DeliveryService extends BaseService
{
    public function sendDeliveryOrderEnhanced(Cargo $cargo)
    {
        return $this->post('rest/delivery/sendDeliveryOrderEnhanced',['json' => $cargo->toArray()]);
    }

    public function track(array $barcodes,$isTrackAdded = true)
    {
        return $this->post('rest/delivery/integration/track',['json' => [
            'barcodes' => $barcodes,
            'isTrackAdded' => $isTrackAdded
        ]]);
    }

    public function deleteDeliveryOrder($deliveryNo, $deleteReason = 'IPTAL')
    {
        return $this->post("/delivery/deleteDeliveryOrder/{$deliveryNo}",['json' => ['deleteReason' => $deleteReason]]);
    }

}