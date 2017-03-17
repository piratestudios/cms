<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\helpers;

use yii\base\InvalidConfigException;

/**
 * Config helper
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
class ConfigHelper
{
    /**
     * Normalizes a time duration value as a DateInterval object.
     *
     * @param int|string|\DateInterval $value The time duration value. Can either be an integer (number of seconds),
     *                                        a string with a valid [duration interval](https://en.wikipedia.org/wiki/ISO_8601#Durations),
     *                                        or a DateInterval object.
     *
     * @return \DateInterval
     * @throws InvalidConfigException if $value is not one of the allowed types
     */
    public static function durationAsInterval($value): \DateInterval
    {
        if ($value instanceof \DateInterval) {
            return $value;
        }

        if (!$value) {
            $value = 0;
        }

        if (is_int($value)) {
            $value = 'PT'.$value.'S';
        }

        if (!is_string($value)) {
            throw new InvalidConfigException("Unable to convert {$value} to seconds.");
        }

        return new \DateInterval($value);
    }

    /**
     * Normalizes a time duration value into the number of seconds it represents.
     *
     * @param int|string|\DateInterval $value The time duration value. Can either be an integer (number of seconds),
     *                                        a string with a valid [duration interval](https://en.wikipedia.org/wiki/ISO_8601#Durations),
     *                                        or a DateInterval object.
     *
     * @return int The time duration in seconds
     * @throws InvalidConfigException if $value is not one of the allowed types
     */
    public static function durationInSeconds($value): int
    {
        if (!$value) {
            return 0;
        }

        if (is_int($value)) {
            return $value;
        }

        if (is_string($value)) {
            $value = new \DateInterval($value);
        }

        if (!$value instanceof \DateInterval) {
            throw new InvalidConfigException("Unable to convert {$value} to seconds.");
        }

        return DateTimeHelper::dateIntervalToSeconds($value);
    }
}