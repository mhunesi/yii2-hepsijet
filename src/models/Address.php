<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 14.12.2021
 * @time: 17:42
 */

namespace mhunesi\hepsijet\models;

use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Address Model
 */
class Address extends Model
{
    /**
     * @var string
     */
    public $companyAddressId;

    /**
     * @var string
     */
    public $addressLine1;

    /**
     * @var string
     */
    public $addressLine2;

    /**
     * @var string
     */
    public $latitude;

    /**
     * @var string
     */
    public $longitude;

    /**
     * @var string
     */
    public $postalCode;

    /**
     * @var Country
     */
    private $_country;

    /**
     * @var City
     */
    private $_city;

    /**
     * @var Town
     */
    private $_town;
    /**
     * @var District
     */
    private $_district;

    /**
     * @return null|Country
     */
    public function getCountry(): Country
    {
        return $this->_country;
    }

    /**
     * @param array|Country $country
     */
    public function setCountry($country)
    {
        if ($country instanceof Country) {
            $this->_country = $country;
        } elseif (is_array($country)) {
            $this->_country = new Country($country);
        }
    }

    /**
     * @return null|City
     */
    public function getCity(): City
    {
        return $this->_city;
    }

    /**
     * @param array|City $city
     */
    public function setCity($city)
    {
        if ($city instanceof City) {
            $this->_city = $city;
        } elseif (is_array($city)) {
            $this->_city = new City($city);
        }
    }

    /**
     * @return null|Town
     */
    public function getTown()
    {
        return $this->_town;
    }

    /**
     * @param array|Town $town
     */
    public function setTown($town)
    {
        if ($town instanceof Town) {
            $this->_town = $town;
        } elseif (is_array($town)) {
            $this->_town = new Town($town);
        }
    }

    /**
     * @return null|District
     */
    public function getDistrict()
    {
        return $this->_district;
    }

    /**
     * @param array|District $district
     */
    public function setDistrict($district)
    {
        if ($district instanceof District) {
            $this->_district = $district;
        } elseif (is_array($district)) {
            $this->_district = new District($district);
        }
    }


    /**
     * @return array
     */
    public function fields()
    {
        return ArrayHelper::merge(parent::fields(), [
            'country' => function () {
                return $this->getCountry();
            },
            'city' => function () {
                return $this->getCity();
            },
            'town' => function () {
                return $this->getTown();
            },
            'district' => function () {
                return $this->getDistrict();
            },
        ]);
    }
}