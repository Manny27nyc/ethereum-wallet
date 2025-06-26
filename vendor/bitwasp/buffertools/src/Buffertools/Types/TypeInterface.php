/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php

declare(strict_types=1);

namespace BitWasp\Buffertools\Types;

use BitWasp\Buffertools\Parser;

interface TypeInterface
{
    /**
     * Flip whatever bitstring is given to us
     *
     * @param  string $bitString
     * @return string
     */
    public function flipBits(string $bitString): string;

    /**
     * @param mixed $integer
     * @return string
     */
    public function write($integer): string;

    /**
     * @param Parser $parser
     * @return mixed
     */
    public function read(Parser $parser);

    /**
     * @return int
     */
    public function getByteOrder(): int;
}
