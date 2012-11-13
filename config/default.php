<?php
/**
 * Autoloader information.
 */
$loader->add('Aura\Intl\\', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src');

/**
 * Configuration defaults.
 */
$di->params['Aura\Intl\FormatterLocator']['registry'] = [
    'basic' => function () { return new Aura\Intl\BasicFormatter; },
    'intl'  => function () { return new Aura\Intl\IntlFormatter; },
];

$di->params['Aura\Intl\TranslatorLocator']['locale'] = 'en_US';
$di->params['Aura\Intl\TranslatorLocator']['factory'] = $di->lazyNew('Aura\Intl\TranslatorFactory');
$di->params['Aura\Intl\TranslatorLocator']['formatters'] = $di->lazyNew('Aura\Intl\FormatterLocator');
$di->params['Aura\Intl\TranslatorLocator']['packages'] = $di->lazyNew('Aura\Intl\PackageLocator');

/**
 * Dependency services.
 */
$di->set('intl_translator_locator', $di->lazyNew('Aura\Intl\TranslatorLocator'));
