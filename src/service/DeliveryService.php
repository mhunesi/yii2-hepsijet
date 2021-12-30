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
    /**
     * @param Cargo $cargo
     * @return BaseService
     */
    public function sendDeliveryOrderEnhanced(Cargo $cargo)
    {
        return $this->post('rest/delivery/sendDeliveryOrderEnhanced',['json' => $cargo->toArray()]);
    }

    /**
     * @param array $barcodes
     * @param bool $isTrackAdded
     * @return BaseService
     */
    public function track(array $barcodes, bool $isTrackAdded = true)
    {
        return $this->post('rest/delivery/integration/track',['json' => [
            'barcodes' => $barcodes,
            'isTrackAdded' => $isTrackAdded
        ]]);
    }

    /**
     * @param string $deliveryNo
     * @param string $deleteReason
     * @return BaseService
     */
    public function deleteDeliveryOrder(string $deliveryNo, string $deleteReason = 'IPTAL')
    {
        return $this->post("rest/delivery/deleteDeliveryOrder/{$deliveryNo}",['json' => ['deleteReason' => $deleteReason]]);
    }

    /**
     * @param string $barcode
     * @param string $totalParcel
     * @return BaseService
     */
    public function generateZplBarcode(string $barcode,string $totalParcel) :BaseService
    {
        return $this->get("rest/delivery/generateZplBarcode/{$barcode}/{$totalParcel}");
    }

}