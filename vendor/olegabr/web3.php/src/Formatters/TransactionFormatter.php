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

namespace Web3\Formatters;

use InvalidArgumentException;
use Web3\Utils;
use Web3\Formatters\IFormatter;
use Web3\Formatters\HexFormatter;
use Web3\Formatters\QuantityFormatter;

class TransactionFormatter implements IFormatter
{
    /**
     * format
     * 
     * @param mixed $value
     * @return string
     */
    public static function format($value)
    {
        if (isset($value['gas'])) {
            $value['gas'] = QuantityFormatter::format($value['gas']);
        }
        if (isset($value['gasPrice'])) {
            $value['gasPrice'] = QuantityFormatter::format($value['gasPrice']);
        }
        if (isset($value['value'])) {
            $value['value'] = QuantityFormatter::format($value['value']);
        }
        if (isset($value['data'])) {
            $value['data'] = HexFormatter::format($value['data']);
        }
        if (isset($value['nonce'])) {
            $value['nonce'] = QuantityFormatter::format($value['nonce']);
        }
        return $value;
    }
}