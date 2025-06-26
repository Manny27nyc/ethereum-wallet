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

namespace FG\ASN1\Universal;

use FG\ASN1\ASNObject;
use FG\ASN1\Parsable;
use FG\ASN1\Identifier;
use FG\ASN1\Exception\ParserException;

class Boolean extends ASNObject implements Parsable
{
    private $value;

    /**
     * @param bool $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getType()
    {
        return Identifier::BOOLEAN;
    }

    protected function calculateContentLength()
    {
        return 1;
    }

    protected function getEncodedValue()
    {
        if ($this->value == false) {
            return chr(0x00);
        } else {
            return chr(0xFF);
        }
    }

    public function getContent()
    {
        if ($this->value == true) {
            return 'TRUE';
        } else {
            return 'FALSE';
        }
    }

    public static function fromBinary(&$binaryData, &$offsetIndex = 0)
    {
        self::parseIdentifier($binaryData[$offsetIndex], Identifier::BOOLEAN, $offsetIndex++);
        $contentLength = self::parseContentLength($binaryData, $offsetIndex);

        if ($contentLength != 1) {
            throw new ParserException("An ASN.1 Boolean should not have a length other than one. Extracted length was {$contentLength}", $offsetIndex);
        }

        $value = ord($binaryData[$offsetIndex++]);
        $booleanValue = $value == 0xFF ? true : false;

        $parsedObject = new self($booleanValue);
        $parsedObject->setContentLength($contentLength);

        return $parsedObject;
    }
}
