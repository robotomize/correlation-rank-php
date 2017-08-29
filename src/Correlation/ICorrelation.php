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
     * @return float
     */
    public static function rank();

    /**
     * @return float
     */
    public static function determination();
}