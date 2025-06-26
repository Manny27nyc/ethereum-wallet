/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php
declare(strict_types=1);

namespace Mdanter\Ecc\Random;

class DebugDecorator implements RandomNumberGeneratorInterface
{
    /**
     * @var RandomNumberGeneratorInterface
     */
    private $generator;

    /**
     * @var string
     */
    private $generatorName;

    /**
     * @param RandomNumberGeneratorInterface $generator
     * @param string $name
     */
    public function __construct(RandomNumberGeneratorInterface $generator, string $name)
    {
        $this->generator = $generator;
        $this->generatorName = $name;
    }

    /**
     * @param \GMP $max
     * @return \GMP
     */
    public function generate(\GMP $max): \GMP
    {
        echo $this->generatorName.'::rand() = ';

        $result = $this->generator->generate($max);

        echo gmp_strval($result, 10).PHP_EOL;

        return $result;
    }
}
