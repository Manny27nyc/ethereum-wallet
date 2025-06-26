/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php

namespace Elliptic\Curve;

class PresetCurve
{
    public $curve;
    public $g;
    public $n;
    public $hash;

    function __construct($options)
    {
        if ( $options["type"] === "short" )
            $this->curve = new ShortCurve($options);
        elseif ( $options["type"] === "edwards" )
            $this->curve = new EdwardsCurve($options);
        else
            $this->curve = new MontCurve($options);

        $this->g = $this->curve->g;
        $this->n = $this->curve->n;
        $this->hash = isset($options["hash"]) ? $options["hash"] : null;
    }
}

?>
