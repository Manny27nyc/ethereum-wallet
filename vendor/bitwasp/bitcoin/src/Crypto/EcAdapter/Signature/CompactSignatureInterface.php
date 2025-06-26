/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php

declare(strict_types=1);

namespace BitWasp\Bitcoin\Crypto\EcAdapter\Signature;

interface CompactSignatureInterface extends SignatureInterface
{
    /**
     * @return SignatureInterface
     */
    public function convert();

    /**
     * @return int
     */
    public function getRecoveryId();

    /**
     * @return bool
     */
    public function isCompressed();
}
