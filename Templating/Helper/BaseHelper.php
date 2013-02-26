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

use Symfony\Component\Templating\Helper\Helper;
use Pear\NumbersWordsBundle\Locale\LocaleDetectorInterface;

/**
 * BaseHelper provides charset conversion.
 *
 * The php Intl extension will always output UTF-8 encoded strings [1]. If the
 * framework is configured to use another encoding than UTF-8 this will lead to
 * garbled text. The BaseHelper provides functionality to the other helpers to
 * convert from UTF-8 to the kernel charset.
 *
 * [1] http://www.php.net/manual/en/intl.examples.basic.php
 *
 * @author Alexander <iam.asm89@gmail.com>
 */
abstract class BaseHelper extends Helper
{
    protected $localeDetector;

    /**
     * Constructor.
     *
     * @param string                                            $charset        The output charset of the helper
     * @param \Pear\NumbersWordsBundle\Locale\LocaleDetectorInterface $localeDetector
     */
    public function __construct($charset, LocaleDetectorInterface $localeDetector)
    {
        $this->setCharset($charset);

        $this->localeDetector = $localeDetector;
    }

}
