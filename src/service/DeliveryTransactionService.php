<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 16.12.2021
 * @time: 11:30
 */

namespace mhunesi\hepsijet\service;

class DeliveryTransactionService extends BaseService
{
    public function getDeliveryTracking(array $customerDeliveryNo)
    {
        $customerDeliveryNo = array_map(function ($element){
            return ['customerDeliveryNo' => $element];
        },$customerDeliveryNo);

        return $this->post('/rest/deliveryTransaction/getDeliveryTracking',['json' => [
            'deliveries' => $customerDeliveryNo
        ]]);
    }

    public function getDeliveryTrackingV2(array $customerDeliveryNo)
    {
        $customerDeliveryNo = array_map(function ($element){
            return ['customerDeliveryNo' => $element];
        },$customerDeliveryNo);

        return $this->post('/rest/deliveryTransaction/getDeliveryTrackingV2',['json' => [
            'deliveries' => $customerDeliveryNo
        ]]);
    }

    public function getEndOfTheDay($startDate = null,$endDate = null)
    {
        if(!$startDate){
            $startDate = (new \DateTime())->modify('-1 days')
                ->setTime(23,59,59)
                ->format(\DateTime::ATOM);
        }

        if(!$endDate){
            $endDate = (new \DateTime())
                ->setTime(23,59,59)
                ->format(\DateTime::ATOM);
        }

        return $this->post('/rest/deliveryTransaction/getEndOfTheDay',['json' => [
            'dateStart' => $startDate,
            'dateEnd' => $endDate,
        ]]);
    }

}