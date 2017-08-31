<?php

namespace Correlation;

/**
 * Class Pearson
 * @package Correlation
 * @author robotomize@gmail.com
 */
class Pearson implements ICorrelation
{
    public static function determination(array $fVector, array $sVector)
    {
        return static::rank($fVector, $sVector) ** 2;
    }

    public static function rank (array $fVector, array $sVector)
    {
        if (\count($fVector) === 0 || \count($sVector) === 0) {
            return 0;
        }

        if (\count($fVector) !== \count($sVector)) {
            return 0;
        }
    }

    /**
     * @param array $values
     *
     * @return float|int
     */
    private static function averageValue(array $values)
    {
        return \array_sum($values) / \count($values);
    }

    /**
     * @param array $values
     * @param       $average
     *
     * @return array
     */
    public static function differenceAverage(array $values, $average)
    {
        return \array_map(function ($element) use ($average) {
            return $element - $average;
        }, $values);
    }

    /**
     * @param array $fVector
     * @param array $sVector
     *
     * @return array
     */
    public static function multiplyVector(array $fVector, array $sVector)
    {
        return \array_map(function ($first, $second) {
            return $first * $second;
        }, $fVector, $sVector);
    }

    /**
     * @param array $values
     * @param       $average
     *
     * @return array
     */
    public static function differenceAverageSquare(array $values, $average)
    {
        return \array_map(function ($element) {
            return $element ** 2;
        }, static::differenceAverage($values, $average));
    }
}
