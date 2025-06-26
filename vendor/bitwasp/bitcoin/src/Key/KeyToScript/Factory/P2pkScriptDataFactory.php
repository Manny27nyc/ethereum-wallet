/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php

declare(strict_types=1);

namespace BitWasp\Bitcoin\Key\KeyToScript\Factory;

use BitWasp\Bitcoin\Crypto\EcAdapter\Key\PublicKeyInterface;
use BitWasp\Bitcoin\Key\KeyToScript\ScriptAndSignData;
use BitWasp\Bitcoin\Script\ScriptFactory;
use BitWasp\Bitcoin\Script\ScriptType;
use BitWasp\Bitcoin\Transaction\Factory\SignData;

class P2pkScriptDataFactory extends KeyToScriptDataFactory
{
    /**
     * @return string
     */
    public function getScriptType(): string
    {
        return ScriptType::P2PK;
    }

    /**
     * @param PublicKeyInterface $publicKey
     * @return ScriptAndSignData
     */
    protected function convertKeyToScriptData(PublicKeyInterface $publicKey): ScriptAndSignData
    {
        return new ScriptAndSignData(
            ScriptFactory::scriptPubKey()->p2pk($publicKey),
            new SignData()
        );
    }
}
