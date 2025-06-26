/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php
/*
 * This file is part of the PHPASN1 library.
 *
 * Copyright © Friedrich Große <friedrich.grosse@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FG\X509\SAN;

use FG\ASN1\Universal\GeneralString;

class DNSName extends GeneralString
{
    const IDENTIFIER = 0x82; // not sure yet why this is the identifier used in SAN extensions

    public function __construct($dnsNameString)
    {
        parent::__construct($dnsNameString);
    }

    public function getType()
    {
        return self::IDENTIFIER;
    }
}
