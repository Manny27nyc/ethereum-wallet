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
use Web3\Validators\HexValidator;
use Web3\Validators\IdentityValidator;

class ShhFilterValidator
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
        if (isset($value['to']) && IdentityValidator::validate($value['to']) === false) {
            return false;
        }
        if (!isset($value['topics']) || !is_array($value['topics'])) {
            return false;
        }
        foreach ($value['topics'] as $topic) {
            if (is_array($topic)) {
                foreach ($topic as $subTopic) {
                    if (HexValidator::validate($subTopic) === false) {
                        return false;
                    }
                }
                continue;
            }
            if (HexValidator::validate($topic) === false) {
                if (!is_null($topic)) {
                    return false;
                }
            }
        }
        return true;
    }
}