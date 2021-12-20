<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 15.12.2021
 * @time: 11:15
 */

namespace mhunesi\hepsijet\models;

use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * @property $company
 * @property $delivery
 * @property $currentXDock
 */
class Cargo extends Model
{
    private $_delivery;
    /**
     * @var CurrentXDock
     */
    private $_currentXDock;
    /**
     * @var Company
     */
    private $_company;

    /**
     * @return array
     */
    public function fields()
    {
        return ArrayHelper::merge(parent::fields(), [
            'company' => function () {
                return $this->getCompany();
            },
            'delivery' => function () {
                return $this->getDelivery();
            },
            'currentXDock' => function () {
                return $this->getCurrentXDock();
            },
        ]);
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->_company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        if ($company instanceof Company) {
            $this->_company = $company;
        } elseif (is_array($company)) {
            $this->_company = new Company($company);
        }
    }

    /**
     * @return Delivery
     */
    public function getDelivery(): Delivery
    {
        return $this->_delivery;
    }

    /**
     * @param array|Delivery $delivery
     */
    public function setDelivery($delivery)
    {
        if ($delivery instanceof Delivery) {
            $this->_delivery = $delivery;
        } elseif (is_array($delivery)) {
            $this->_delivery = new Delivery($delivery);
        }
    }

    /**
     * @return CurrentXDock
     */
    public function getCurrentXDock(): CurrentXDock
    {
        return $this->_currentXDock;
    }

    /**
     * @param array|CurrentXDock $currentXDock
     */
    public function setCurrentXDock($currentXDock)
    {
        if ($currentXDock instanceof CurrentXDock) {
            $this->_currentXDock = $currentXDock;
        } elseif (is_array($currentXDock)) {
            $this->_currentXDock = new CurrentXDock($currentXDock);
        }
    }

}