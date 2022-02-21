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

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Message;
use GuzzleHttp\Psr7\Request;
use yii\base\BaseObject;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use yii\base\Exception;
use yii\helpers\Json;

/**
 * @property boolean $status
 * @property string $message
 * @property ResponseInterface $response
 * @property RequestInterface $request
 * @property Client $client
 */
abstract class BaseService extends BaseObject
{
    /**
     * @var boolean
     */
    private $_status;

    /**
     * @var Client
     */
    private $_client;

    /**
     * @var ResponseInterface
     */
    private $_response;

    /**
     * @var RequestInterface
     */
    private $_request;

    /**
     * @var array
     */
    private $_options;

    /**
     * @var string
     */
    private $_message;

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->_message = $message;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->_options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->_options = $options;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->_client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client)
    {
        $this->_client = $client;
    }

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->_status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status)
    {
        $this->_status = $status;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->_response;
    }

    /**
     * @param ResponseInterface $response
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->_response = $response;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->_request;
    }

    /**
     * @param RequestInterface $request
     */
    public function setRequest(RequestInterface $request)
    {
        $this->_request = $request;
    }

    /**
     * @param string $uri
     * @param array $options
     * @return self
     */
    public function get(string $uri, array $options = []): self
    {
        $request =  new Request('GET',$uri);

        return $this->send($request,$options);
    }

    /**
     * @param string $uri
     * @param array $options
     * @return self
     */
    public function post(string $uri, array $options = []): self
    {
        $request =  new Request('POST',$uri);

        return $this->send($request,$options);
    }

    /**
     * @param Request $request
     * @param array $options
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \yii\base\Exception
     */
    private function send(Request $request,array $options)
    {
        $this->_request = $request;

        $this->_options = $options;

        try{
            $this->_response = $this->_client->send($request,$options);
        } catch (ConnectException $e){
            throw new Exception($e->getMessage());
        } catch (RequestException $e){
            $this->_response = $e->getResponse();
        }

        $result = $this->toArray();

        $responseStatusCode = $this->_response->getStatusCode();

        if($responseStatusCode === 200 && $result['status'] === 'OK'){
            $this->_status = true;
            $this->_message = $result['message'] ?? 'Message not found';
        }else if ($responseStatusCode !== 200){
            $this->_status = false;
            $this->_message = $result['message'] ?? 'Message not found';
        } else{
            $this->_status = false;
            $this->_message = "";
        }

        return $this;
    }

    /**
     * @return string
     */
    public function toString()
    {
        $body = strtoupper($this->_request->getMethod()) === 'POST' ? ($this->_options['body'] ?? $this->_options['json']) : null;

        $this->_request = new Request(
            $this->_request->getMethod(),
            $this->_request->getUri(),
            $this->_client->getConfig('headers'),
            Json::encode($body)
        );

        return "Request: \n\n" . Message::toString($this->request) . "\n\nResponse: \n\n" . Message::toString($this->response);
    }

    public function toArray()
    {
        return Json::decode($this->_response->getBody());
    }
}