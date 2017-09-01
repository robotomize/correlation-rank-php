<?php

namespace Correlation;

/**
 * Class Pearson
 * @package Correlation
 * @author robotomize@gmail.com
 */
class Pearson implements ICorrelation
{
    /**
     * @param array $fVector
     * @param array $sVector
     *
     * @return float|int
     */
    public static function determination(array $fVector, array $sVector)
    {
        return static::rank($fVector, $sVector) ** 2;
    }

    /**
     * @param array $fVector
     * @param array $sVector
     *
     * @return float|int
     */
    public static function rank (array $fVector, array $sVector)
    {
        if (\count($fVector) === 0 || \count($sVector) === 0) {
            return 0;
        }

        if (\count($fVector) !== \count($sVector)) {
            return 0;
        }

        $numeratorSum = \array_sum(self::multiplyVector(
            self::differenceAverage($fVector, self::averageValue($fVector)),
            self::differenceAverage($sVector, self::averageValue($sVector))));
        $differenceSquareSumFirstVector = \array_sum(self::differenceAverageSquare($fVector, self::averageValue($fVector)));
        $differenceSquareSumSecondVector = \array_sum(self::differenceAverageSquare($fVector, self::averageValue($fVector)));
        $denominatorSum = \sqrt($differenceSquareSumFirstVector * $differenceSquareSumSecondVector);

        if ($denominatorSum === 0) {
            return 0;
        }

        return $numeratorSum / $denominatorSum;
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
