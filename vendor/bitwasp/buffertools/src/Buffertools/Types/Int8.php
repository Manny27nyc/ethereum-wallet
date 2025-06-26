/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php

declare(strict_types=1);

namespace BitWasp\Buffertools\Types;

class Int8 extends AbstractSignedInt
{
    /**
     * @return int
     */
    public function getBitSize(): int
    {
        return 8;
    }
}
