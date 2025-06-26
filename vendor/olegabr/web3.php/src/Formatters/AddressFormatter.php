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
use Web3\Formatters\IntegerFormatter;

class AddressFormatter implements IFormatter
{
    /**
     * format
     * to do: iban
     * 
     * @param mixed $value
     * @return string
     */
    public static function format($value)
    {
        $value = (string) $value;

        if (Utils::isAddress($value)) {
            $value = mb_strtolower($value);

            if (Utils::isZeroPrefixed($value)) {
                return $value;
            }
            return '0x' . $value;
        }
        $value = IntegerFormatter::format($value, 40);

        return '0x' . $value;
    }
}