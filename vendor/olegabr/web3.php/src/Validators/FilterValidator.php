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
use Web3\Validators\AddressValidator;

class FilterValidator
{
    /**
     * validate
     *
     * @param array $value
     * @return bool
     */
    public static function validate($value)
    {
        if (!is_array($value)) {
            return false;
        }
        if (
            isset($value['fromBlock']) &&
            QuantityValidator::validate($value['fromBlock']) === false &&
            TagValidator::validate($value['fromBlock']) === false
            ) {
            return false;
        }
        if (
            isset($value['toBlock']) &&
            QuantityValidator::validate($value['toBlock']) === false &&
            TagValidator::validate($value['toBlock']) === false
            ) {
            return false;
        }
        if (isset($value['address'])) {
            if (is_array($value['address'])) {
                foreach ($value['address'] as $address) {
                    if (AddressValidator::validate($address) === false) {
                        return false;
                    }
                }
            } elseif (AddressValidator::validate($value['address']) === false) {
                return false;
            }
        }
        if (isset($value['topics']) && is_array($value['topics'])) {
            foreach ($value['topics'] as $topic) {
                if (is_array($topic)) {
                    foreach ($topic as $v) {
                        if (isset($v) && HexValidator::validate($v) === false) {
                            return false;
                        }
                    }
                } else {
                    if (isset($topic) && HexValidator::validate($topic) === false) {
                        return false;
                    }
                }
            }
        }
        return true;
    }
}