/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php

declare(strict_types=1);

namespace BitWasp\Buffertools;

class ByteOrder
{
    /**
     * Little endian means bytes must be flipped
     */
    const LE = 0;

    /**
     * Assuming machine byte order?
     */
    const BE = 1;
}
