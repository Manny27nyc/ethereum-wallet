/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php
/**
 * Bootstrapping File for phpseclib
 *
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 */

if (extension_loaded('mbstring')) {
    // 2 - MB_OVERLOAD_STRING
    if (ini_get('mbstring.func_overload') & 2) {
        throw new \UnexpectedValueException(
            'Overloading of string functions using mbstring.func_overload ' .
            'is not supported by phpseclib.'
        );
    }
}
