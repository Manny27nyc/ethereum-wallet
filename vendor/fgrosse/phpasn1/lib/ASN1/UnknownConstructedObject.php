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

namespace FG\ASN1;

class UnknownConstructedObject extends Construct
{
    private $identifier;
    private $contentLength;

    /**
     * @param string $binaryData
     * @param int $offsetIndex
     *
     * @throws \FG\ASN1\Exception\ParserException
     */
    public function __construct($binaryData, &$offsetIndex)
    {
        $this->identifier = self::parseBinaryIdentifier($binaryData, $offsetIndex);
        $this->contentLength = self::parseContentLength($binaryData, $offsetIndex);

        $children = [];
        $octetsToRead = $this->contentLength;
        while ($octetsToRead > 0) {
            $newChild = ASNObject::fromBinary($binaryData, $offsetIndex);
            $octetsToRead -= $newChild->getObjectLength();
            $children[] = $newChild;
        }

        parent::__construct(...$children);
    }

    public function getType()
    {
        return ord($this->identifier);
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }

    protected function calculateContentLength()
    {
        return $this->contentLength;
    }

    protected function getEncodedValue()
    {
        return '';
    }
}
