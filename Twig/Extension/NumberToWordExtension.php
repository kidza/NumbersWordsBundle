<?php

/*
 * This file is part of the PearNumbersWords bundle.
 *
 * (c) Jakub Roszkiewicz (Vaka Software) <j.roszkiewicz@vaka.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pear\NumbersWordsBundle\Twig\Extension;

use Pear\NumbersWordsBundle\Templating\Helper\NumberToWordHelper;

/**
 * DateTimeExtension extends Twig with localized date/time capabilities.
 *
 * @author Thomas Rabaix <thomas.rabaix@ekino.com>
 */
class NumberToWordExtension extends \Twig_Extension
{

    protected $helper;

    public function __construct(NumberToWordHelper $helper)
    {
        $this->helper = $helper;
    }

    /**
     * {@inheritdoc}
     */
    public function initRuntime(\Twig_Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * Returns the token parser instance to add to the existing list.
     *
     * @return array An array of Twig_TokenParser instances
     */
    public function getTokenParsers()
    {
        return array(
        );
    }

    public function getFilters()
    {
        return array(
            'number_to_word'     => new \Twig_Filter_Method($this, 'numberToWord', array('is_safe' => array('html')))
        );
    }

    public function numberToWord($number, $locale = null)
    {
        return $this->helper->numberToWord($number, $locale);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'pear_numberswords_numbertoword';
    }
}
