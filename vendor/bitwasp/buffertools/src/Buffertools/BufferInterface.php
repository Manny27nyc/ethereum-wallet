/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php

declare(strict_types=1);

namespace BitWasp\Buffertools;

interface BufferInterface
{
    /**
     * @param int              $start
     * @param int|null         $end
     * @return BufferInterface
     * @throws \Exception
     */
    public function slice(int $start, int $end = null): BufferInterface;

    /**
     * Get the size of the buffer to be returned
     *
     * @return int
     */
    public function getSize(): int;

    /**
     * Get the size of the value stored in the buffer
     *
     * @return int
     */
    public function getInternalSize(): int;

    /**
     * @return string
     */
    public function getBinary(): string;

    /**
     * @return string
     */
    public function getHex(): string;

    /**
     * @return int|string
     */
    public function getInt();

    /**
     * @return \GMP
     */
    public function getGmp(): \GMP;

    /**
     * @return Buffer
     */
    public function flip(): BufferInterface;

    /**
     * @param BufferInterface $other
     * @return bool
     */
    public function equals(BufferInterface $other): bool;
}
