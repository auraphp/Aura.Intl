<?php
/**
 * 
 * This file is part of the Aura Project for PHP.
 * 
 * @package Aura.Intl
 * 
 * @license http://opensource.org/licenses/bsd-license.php BSD
 * 
 */
namespace Aura\Intl;

use MessageFormatter;

/**
 * 
 * Uses php intl extension to format messages
 * 
 * @package Aura.Intl
 * 
 */
class IntlFormatter implements FormatterInterface
{
    /**
     * 
     * Format the message with the help of php intl extension
     * 
     * @param string $locale
     * @param string $string
     * @param array $tokens_values
     * @return string
     * @throws Exception
     */
    public function format($locale, $string, array $tokens_values)
    {
        // extract tokens and retain sequential positions
        $tokens = [];
        $i = 0;

        // opening brace and colon, followed by the token word characters,
        // followed by any non-token word character
        $regex = '/(\{\:)([A-Za-z0-9_]+)([^A-Za-z0-9_])/m';
        preg_match_all($regex, $string, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {

            // retain the token name
            $tokens[$i] = $match[2];

            // replace just the first occurence;
            // other occurrences will get replaced later.
            $string = preg_replace(
                "/$match[0]/",
                '{' . $i . $match[3],
                $string,
                1
            );

            // increment counter
            $i++;
        }

        $values = [];
        foreach ($tokens as $i => $token) {
            if (isset($tokens_values[$token])) {
                $values[$i] = $tokens_values[$token];
            }
        }

        $formatter = new MessageFormatter($locale, $string);
        if (! $formatter) {
            throw new Exception(
                intl_get_error_message(),
                intl_get_error_code()
            );
        }

        $result = $formatter->format($values);
        if ($result === false) {
            throw new Exception(
                $formatter->getErrorMessage(),
                $formatter->getErrorCode()
            );
        }

        return $result;
    }
}
