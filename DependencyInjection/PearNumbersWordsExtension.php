<?php
/*
 * This file is part of the PearNumbersWords bundle.
 *
 * (c) Jakub Roszkiewicz (Vaka Software) <j.roszkiewicz@vaka.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pear\NumbersWordsBundle\DependencyInjection;

use Pear\NumbersWordsBundle\PearNumbersWordsBundle;

use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\HttpKernel\Kernel;

/**
 * PearNumbersWordsExtension
 *
 * @author Vaka Software (vaka.pl)
 * @author Jakub Roszkiewicz <j.roszkiewicz@vaka.pl>
 */
class PearNumbersWordsExtension extends Extension
{

    /**
     * Loads the url shortener configuration.
     *
     * @param array            $config    An array of configuration settings
     * @param ContainerBuilder $container A ContainerBuilder instance
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        if (version_compare(PearNumbersWordsBundle::getSymfonyVersion(Kernel::VERSION), '2.1.0', '>=')) {
            $container->getDefinition('pear.numberswords.locale_detector.request')->replaceArgument(1, $config['locale'] ? $config['locale'] : $container->getParameter('kernel.default_locale'));
            $container->setAlias('pear.numberswords.locale_detector', 'pear.numberswords.locale_detector.request');
            $container->removeDefinition('pear.numberswords.locale_detector.session');
        } else {
            $container->getDefinition('pear.numberswords.locale_detector.session')->replaceArgument(1, $config['locale'] ? $config['locale'] : $container->getParameter('session.default_locale'));
            $container->setAlias('pear.numberswords.locale_detector', 'pear.numberswords.locale_detector.session');
            $container->removeDefinition('pear.numberswords.locale_detector.request');
        }
    }

    /**
     * Returns the base path for the XSD files.
     *
     * @return string The XSD base path
     */
    public function getXsdValidationBasePath()
    {
        return __DIR__.'/../Resources/config/schema';
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return 'http://www.vaka.pl/schema/dic/numberswords';
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return "pear_numberswords";
    }

}
