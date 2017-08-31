<?php

namespace Correlation;

/**
 * Interface ICorrelation
 * @package Correlation
 * @author robotomize@gmail.com
 */
interface ICorrelation
{
    /**
     * @param array $fVector
     * @param array $sVector
     *
     * @return float
     */
    public static function rank(array $fVector, array $sVector);

    /**
     * @param array $fVector
     * @param array $sVector
     *
     * @return float
     */
    public static function determination(array $fVector, array $sVector);
}