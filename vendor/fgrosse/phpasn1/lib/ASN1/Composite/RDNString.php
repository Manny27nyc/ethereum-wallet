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

namespace FG\ASN1\Composite;

use FG\ASN1\Universal\PrintableString;
use FG\ASN1\Universal\IA5String;
use FG\ASN1\Universal\UTF8String;

class RDNString extends RelativeDistinguishedName
{
    /**
     * @param string|\FG\ASN1\Universal\ObjectIdentifier $objectIdentifierString
     * @param string|\FG\ASN1\ASNObject $value
     */
    public function __construct($objectIdentifierString, $value)
    {
        if (PrintableString::isValid($value)) {
            $value = new PrintableString($value);
        } else {
            if (IA5String::isValid($value)) {
                $value = new IA5String($value);
            } else {
                $value = new UTF8String($value);
            }
        }

        parent::__construct($objectIdentifierString, $value);
    }
}
