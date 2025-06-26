/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php

namespace Mdanter\Ecc\Crypto\Signature;

use Mdanter\Ecc\Primitives\GeneratorPoint;

interface HasherInterface
{
    /**
     * @return string
     */
    public function getAlgorithm(): string;

    /**
     * @return int
     */
    public function getLengthInBytes(): int;

    /**
     * @param string $data
     * @return string
     */
    public function makeRawHash(string $data): string;

    /**
     * @param string $data
     * @param GeneratorPoint $G
     * @return \GMP
     */
    public function makeHash(string $data, GeneratorPoint $G): \GMP;
}
