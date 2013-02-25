<?php

/*
 * This file is part of the PearNumbersWords bundle.
 *
 * (c) Jakub Roszkiewicz (Vaka Software) <j.roszkiewicz@vaka.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pear\NumbersWordsBundle\Locale;

interface LocaleDetectorInterface
{
    /**
     * @return string
     */
    public function getLocale();
}
