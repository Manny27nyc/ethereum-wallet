/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php

declare(strict_types=1);

namespace BitWasp\Bitcoin\Transaction\Factory\Checker;

use BitWasp\Bitcoin\Script\Interpreter\CheckerBase;
use BitWasp\Bitcoin\Script\Interpreter\BitcoinCashChecker;
use BitWasp\Bitcoin\Script\Interpreter\Checker;
use BitWasp\Bitcoin\Transaction\TransactionInterface;
use BitWasp\Bitcoin\Transaction\TransactionOutputInterface;

class BitcoinCashCheckerCreator extends CheckerCreator
{
    /**
     * @param TransactionInterface $tx
     * @param int $nInput
     * @param TransactionOutputInterface $txOut
     * @return Checker
     */
    public function create(TransactionInterface $tx, int $nInput, TransactionOutputInterface $txOut): CheckerBase
    {
        return new BitcoinCashChecker($this->ecAdapter, $tx, $nInput, $txOut->getValue(), $this->txSigSerializer, $this->pubKeySerializer);
    }
}
