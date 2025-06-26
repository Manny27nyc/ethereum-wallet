/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php

/**
 * This file is part of web3.php package.
 * 
 * (c) Kuan-Cheng,Lai <alk03073135@gmail.com>
 * 
 * @author Peter Lai <alk03073135@gmail.com>
 * @license MIT
 */

namespace Web3\Providers;

use Web3\RequestManagers\RequestManager;

class Provider
{
    /**
     * requestManager
     * 
     * @var \Web3\RequestManagers\RequestManager
     */
    protected $requestManager;

    /**
     * isBatch
     * 
     * @var bool
     */
    protected $isBatch = false;

    /**
     * batch
     * 
     * @var array
     */
    protected $batch = [];

    /**
     * rpcVersion
     * 
     * @var string
     */
    protected $rpcVersion = '2.0';

    /**
     * id
     * 
     * @var integer
     */
    protected $id = 0;

    /**
     * construct
     * 
     * @param \Web3\RequestManagers\RequestManager $requestManager
     * @return void
     */
    public function __construct(RequestManager $requestManager)
    {
        $this->requestManager = $requestManager;
    }

    /**
     * get
     * 
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);

        if (method_exists($this, $method)) {
            return call_user_func_array([$this, $method], []);
        }
        return false;
    }

    /**
     * set
     * 
     * @param string $name
     * @param mixed $value
     * @return bool
     */
    public function __set($name, $value)
    {
        $method = 'set' . ucfirst($name);

        if (method_exists($this, $method)) {
            return call_user_func_array([$this, $method], [$value]);
        }
        return false;
    }

    /**
     * getRequestManager
     * 
     * @return \Web3\RequestManagers\RequestManager
     */
    public function getRequestManager()
    {
        return $this->requestManager;
    }

    /**
     * getIsBatch
     * 
     * @return bool
     */
    public function getIsBatch()
    {
        return $this->isBatch;
    }
}