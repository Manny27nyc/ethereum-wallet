/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php
declare(strict_types=1);

namespace Mdanter\Ecc\Random;

use Mdanter\Ecc\Math\GmpMathInterface;
use Mdanter\Ecc\Util\NumberSize;

class RandomNumberGenerator implements RandomNumberGeneratorInterface
{
    /**
     * @var GmpMathInterface
     */
    private $adapter;

    /**
     * RandomNumberGenerator constructor.
     * @param GmpMathInterface $adapter
     */
    public function __construct(GmpMathInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param \GMP $max
     * @return \GMP
     */
    public function generate(\GMP $max): \GMP
    {
        $numBits = NumberSize::bnNumBits($this->adapter, $max);
        $numBytes = (int) ceil($numBits / 8);
        // Generate an integer of size >= $numBits
        $bytes = random_bytes($numBytes);
        $value = $this->adapter->stringToInt($bytes);

        $mask = gmp_sub(gmp_pow(2, $numBits), 1);
        $integer = gmp_and($value, $mask);

        return $integer;
    }
}
