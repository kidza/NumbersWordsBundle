<?php

/*
 * This file is part of the PearNumbersWords bundle.
 *
 * (c) Jakub Roszkiewicz (Vaka Software) <j.roszkiewicz@vaka.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pear\NumbersWordsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PearNumbersWordsBundle extends Bundle
{
    /**
     * Returns a cleaned version number
     *
     * @static
     * @param $version
     * @return string
     */
    public static function getSymfonyVersion($version)
    {
        return implode('.', array_slice(array_map(function($val) { return (int) $val; }, explode('.', $version)), 0, 3));
    }
}
