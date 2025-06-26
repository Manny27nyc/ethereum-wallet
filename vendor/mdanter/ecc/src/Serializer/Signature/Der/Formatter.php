/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php
declare(strict_types=1);

namespace Mdanter\Ecc\Serializer\Signature\Der;

use FG\ASN1\Universal\Integer;
use FG\ASN1\Universal\Sequence;
use Mdanter\Ecc\Crypto\Signature\SignatureInterface;

class Formatter
{
    /**
     * @param SignatureInterface $signature
     * @return Sequence
     */
    public function toAsn(SignatureInterface $signature): Sequence
    {
        return new Sequence(
            new Integer(gmp_strval($signature->getR(), 10)),
            new Integer(gmp_strval($signature->getS(), 10))
        );
    }

    /**
     * @param SignatureInterface $signature
     * @return string
     */
    public function serialize(SignatureInterface $signature): string
    {
        return $this->toAsn($signature)->getBinary();
    }
}
