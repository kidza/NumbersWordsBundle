<?php

/*
 * This file is part of the PearNumbersWords bundle.
 *
 * (c) Jakub Roszkiewicz (Vaka Software) <j.roszkiewicz@vaka.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pear\NumbersWordsBundle\Templating\Helper;

use Pear\NumbersWordsBundle\Locale\LocaleDetectorInterface;

/**
 * @author Vaka Software
 * @author Jakub Roszkiewicz <j.roszkiewicz@vaka.pl>
 */
class NumerToWordsHelper extends BaseHelper
{
    /**
     * @param string                    $charset
     * @param LocaleDetectorInterface   $localeDetector
     */
    public function __construct($charset, LocaleDetectorInterface $localeDetector)
    {
        parent::__construct($charset, $localeDetector);
    }

    /**
     * @param integer $number 
     * @param null|string              $locale
     * @return string
     */
    public function numberToWord($number, $locale = null)
    {        
        return \Numbers_Words::toWords($number, $locale);
    }

    /**
     * Returns the canonical name of this helper.
     *
     * @return string The canonical name
     */
    public function getName()
    {
        return 'pear_numberswords_numbertoword';
    }
}
