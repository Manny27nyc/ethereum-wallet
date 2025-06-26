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

namespace Web3\Validators;

use Web3\Validators\IValidator;
use Web3\Validators\QuantityValidator;
use Web3\Validators\TagValidator;
use Web3\Validators\HexValidator;

class TransactionValidator
{
    /**
     * validate
     * To do: check is data optional?
     * Data is not optional on spec, see https://github.com/ethereum/wiki/wiki/JSON-RPC#eth_sendtransaction
     * 
     * @param array $value
     * @return bool
     */
    public static function validate($value)
    {
        if (!is_array($value)) {
            return false;
        }
        if (!isset($value['from'])) {
            return false;
        }
        if (AddressValidator::validate($value['from']) === false) {
            return false;
        }
        if (isset($value['to']) && AddressValidator::validate($value['to']) === false && $value['to'] !== '') {
            return false;
        }
        if (isset($value['gas']) && QuantityValidator::validate($value['gas']) === false) {
            return false;
        }
        if (isset($value['gasPrice']) && QuantityValidator::validate($value['gasPrice']) === false) {
            return false;
        }
        if (isset($value['value']) && QuantityValidator::validate($value['value']) === false) {
            return false;
        }
        // if (!isset($value['data'])) {
        //     return false;
        // }
        // if (HexValidator::validate($value['data']) === false) {
        //     return false;
        // }
        if (isset($value['data']) && HexValidator::validate($value['data']) === false) {
            return false;
        }
        if (isset($value['nonce']) && QuantityValidator::validate($value['nonce']) === false) {
            return false;
        }
        return true;
    }
}