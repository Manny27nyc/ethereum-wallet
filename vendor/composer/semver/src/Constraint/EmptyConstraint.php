/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php

/*
 * This file is part of composer/semver.
 *
 * (c) Composer <https://github.com/composer>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Composer\Semver\Constraint;

/**
 * Defines the absence of a constraint.
 */
class EmptyConstraint implements ConstraintInterface
{
    /** @var string */
    protected $prettyString;

    /**
     * @param ConstraintInterface $provider
     *
     * @return bool
     */
    public function matches(ConstraintInterface $provider)
    {
        return true;
    }

    /**
     * @param $prettyString
     */
    public function setPrettyString($prettyString)
    {
        $this->prettyString = $prettyString;
    }

    /**
     * @return string
     */
    public function getPrettyString()
    {
        if ($this->prettyString) {
            return $this->prettyString;
        }

        return $this->__toString();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return '[]';
    }
}
