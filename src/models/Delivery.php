<?php
/**
 * (developer comment)
 *
 * @link http:
 * @copyright Copyright (c) 2021 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 14.12.2021
 * @time: 17:29
 */

namespace mhunesi\hepsijet\models;

use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * @property $receiver
 */
class Delivery extends Model
{
    /**
     * @var string
     * Her gönderi için unique olmalıdır. Ex: CPY1910202121
     */
    public $customerDeliveryNo;

    /**
     * @var string
     * "customerDeliveryNo" ile aynı gönderilebilir.
     */
    public $customerOrderId;

    /**
     * @var integer
     * Sipariş kaç paketten oluşuyorsa, bu alana o girilmelidir.
     */
    public $totalParcels;

    /**
     * @var double
     * Delivery total price (TRY)
     */
    public $deliveryTotalPrice = 0;

    /**
     * @var double
     * Paketlerin desi ölçüsünü verir.
     */
    public $desi = 0;

    /**
     * @var double
     * Delivery weight (Kg)
     */
    public $weight = 0;

    /**
     * @var double
     * Delivery width (Mt)
     */
    public $width = 0;

    /**
     * @var double
     * Delivery height (Mt)
     */
    public $height = 0;

    /**
     * @var double
     * Delivery lenght (Mt)
     */
    public $length = 0;

    /**
     * @var integer
     * Requested delivery slot
     * Ex:
     * 0 > Slot Off
     * 1 > Slot1 (Morning 09:00-13:00)
     * 2 > Slot2 (Noon 13:00-18:00)
     * 3 > Slot3 (Evening 18:00-23:00)
     */
    public $deliverySlotOriginal;

    /**
     * @var string
     * Gönderi oluşturulan tarih bilgisi gönderilmelidir.
     */
    public $deliveryDateOriginal;

    /**
     * @var string
     * "RETAIL"
     */
    public $deliveryType;

    /**
     * @var string
     */
    public $recipientPerson;

    /**
     * @var string
     */
    public $recipientPersonPhone1;

    /**
     * @var Address
     */
    private $_senderAddress;

    /**
     * @var Address
     */
    private $_recipientAddress;

    /**
     * @var Receiver
     */
    private $_receiver;

    /**
     * @var string
     */
    private $_product;

    /**
     * @var DeliveryContent[]
     */
    private $_deliveryContent = [];

    /**
     * @inheritDoc
     */
    public function fields()
    {
        return ArrayHelper::merge(parent::fields(), [
            'receiver' => function () {
                return $this->getReceiver();
            },
            'product' => function () {
                return $this->getProduct();
            },
            'senderAddress' => function () {
                return $this->getSenderAddress();
            },
            'recipientAddress' => function () {
                return $this->getRecipientAddress();
            },
            'deliveryContent' => function () {
                return $this->getDeliveryContent();
            },
        ]);
    }

    /**
     * @return Receiver
     */
    public function getReceiver()
    {
        return $this->_receiver;
    }

    /**
     * @param array|Receiver $receiver
     */
    public function setReceiver($receiver)
    {
        if ($receiver instanceof Receiver) {
            $this->_receiver = $receiver;
        } elseif (is_array($receiver)) {
            $this->_receiver = new Receiver($receiver);
        }
    }

    /**
     * @return DeliveryContent[]
     */
    public function getDeliveryContent() :array
    {
        return $this->_deliveryContent;
    }

    /**
     * @param array|DeliveryContent[] $deliveryContents
     */
    public function setDeliveryContent(array $deliveryContents): void
    {
        $this->_deliveryContent = [];

        foreach ($deliveryContents as $deliveryContent) {
            $this->addDeliveryContent($deliveryContent);
        }
    }

    /**
     * @param array|DeliveryContent $deliveryContent
     */
    public function addDeliveryContent($deliveryContent)
    {
        if ($deliveryContent instanceof DeliveryContent) {
            $this->_deliveryContent[] = $deliveryContent;
        } elseif (is_array($deliveryContent)) {
            $this->_deliveryContent[] = new DeliveryContent($deliveryContent);
        }
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->_product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        if ($product instanceof Product) {
            $this->_product = $product;
        } elseif (is_array($product)) {
            $this->_product = new Product($product);
        }
    }

    /**
     * @return Address
     */
    public function getSenderAddress(): Address
    {
        return $this->_senderAddress;
    }

    /**
     * @param array|Address $senderAddress
     */
    public function setSenderAddress($senderAddress)
    {
        if ($senderAddress instanceof Address) {
            $this->_senderAddress = $senderAddress;
        } elseif (is_array($senderAddress)) {
            $this->_senderAddress = new Address($senderAddress);
        }
    }

    /**
     * @return Address
     */
    public function getRecipientAddress()
    {
        return $this->_recipientAddress;
    }

    /**
     * @param array|Address $recipientAddress
     */
    public function setRecipientAddress($recipientAddress)
    {
        if ($recipientAddress instanceof Address) {
            $this->_recipientAddress = $recipientAddress;
        } elseif (is_array($recipientAddress)) {
            $this->_recipientAddress = new Address($recipientAddress);
        }
    }
}