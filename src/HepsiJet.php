<?php

namespace mhunesi\hepsijet;

use Yii;
use yii\helpers\Json;
use GuzzleHttp\Client;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;
use mhunesi\hepsijet\service\DeliveryService;
use mhunesi\hepsijet\service\SettlementService;
use mhunesi\hepsijet\service\CompanyLimitService;
use mhunesi\hepsijet\service\DeliveryTransactionService;

/**
 * This is just an example.
 */
class HepsiJet extends Component
{
    /**
     * @var string
     */
    public $apiUrl = 'https://dmzlastmile.hepsiexpress.com:8091/';

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $cacheKey = 'hepsijet_token';

    /**
     * @var array
     */
    public $clientOptions = [];

    /**
     * @var string
     */
    private $_token;

    /**
     * @var Client
     */
    private $_client;

    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->authorize();

        $this->initClient();
    }

    /**
     * @return bool
     */
    private function authorize()
    {
        $this->cacheKey .= $this->username . $this->password;

        $this->_token = Yii::$app->cache->getOrSet($this->cacheKey,function (){

            $client = new Client(ArrayHelper::merge($this->clientOptions,[
                'base_uri' => $this->apiUrl,
                'auth' => [$this->username, $this->password]
            ]));

            $response = $client->get("auth/getToken");

            $result = Json::decode($response->getBody());

            if($response->getStatusCode() === 200 && ArrayHelper::getValue($result,'status') === 'OK'){
                return ArrayHelper::getValue($result,'data.token');
            }

            throw new InvalidConfigException($result['message'] ?? $response->getBody());
        },3200);

        return true;
    }

    private function initClient()
    {
        $options = [
            'base_uri' => $this->apiUrl,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-Auth-Token' => $this->_token
            ],
        ];

        $this->_client = new Client(ArrayHelper::merge($this->clientOptions,$options));
    }

    /**
     * @return DeliveryService
     */
    public function delivery()
    {
        return new DeliveryService([
            'client' => $this->_client
        ]);
    }

    /**
     * @return CompanyLimitService
     */
    public function companyLimit()
    {
        return new CompanyLimitService([
            'client' => $this->_client
        ]);
    }

    /**
     * @return DeliveryTransactionService
     */
    public function deliveryTransaction()
    {
        return new DeliveryTransactionService([
            'client' => $this->_client
        ]);
    }

    /**
     * @return SettlementService
     */
    public function settlement()
    {
        return new SettlementService([
            'client' => $this->_client
        ]);
    }
}
