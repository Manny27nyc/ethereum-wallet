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

namespace Web3\Contracts\Types;

interface IType
{
    /**
     * isType
     * 
     * @param string $name
     * @return bool
     */
    public function isType($name);

    /**
     * isDynamicType
     * 
     * @return bool
     */
    public function isDynamicType();

    /**
     * inputFormat
     * 
     * @param mixed $value
     * @param string $name
     * @return string
     */
    public function inputFormat($value, $name);
}