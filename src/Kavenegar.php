<?php
namespace Kavenegar\Yii2;

use yii\base\Component;
use yii\base\InvalidConfigException;

class Kavenegar extends Component
{
    public $apikey;
    private $_api = null;

    public function init()
    {
        if (!$this->apikey) {
            throw new InvalidConfigException('apikey is required');
        }
    }	
    public function KavenegarApi()
    {
        if ($this->_api === null) {
            $client = new \Kavenegar\KavenegarApi($this->apikey);
            $this->_api = $client;
        }
        return $this->_api;
    }
} 
