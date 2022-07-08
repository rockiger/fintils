<?php

namespace Rockiger\Fintils;

use ErrorException;

class Fintils {

  /**
   * R - the simple return of two prices
   * Traditionally simple returns are denoted with a capital R and are calculated as:
   * Rt = (Pt – Pt-1) / Pt-1 = Pt / Pt-1 – 1
   *
   * @return float
   *
   */
  public static function R(float $P_t, float $P_t_minus_1 = null): float {
    if ($P_t_minus_1 === null) {
      return 0.0;
    }
    return ($P_t / $P_t_minus_1) - 1;
  }


  /**
   * Converts an array of prices to an array of returns
   * 
   * @param float[] $Ps 
   * @return float[]
   */
  public static function Rs(array $Ps): array {
    $Rs = [];
    for ($i = 0; $i < count($Ps); $i++) {
      if ($i == 0) {
        $Rs[$i] = 0.0;
      } else {
        $Rs[$i] = self::R($Ps[$i], $Ps[$i - 1]);
      }
    }
    return $Rs;
  }


  /**
   * QuantDare correlation
   * A measure of how much two random variables change together without the general trend
   * of the mean.
   * https://quantdare.com/correlation-prices-returns/
   * 
   *           ∑xᵢyᵢ
   * dqxy = -----------
   *         √∑xᵢ²∑yᵢ²
   * 
   * @param array $X 
   * @param array $Y 
   * @return float 
   */
  public static function dq(array $X, array $Y): float {

    if (count($X) !== count($Y)) {
      throw new ErrorException('X and Y must have the same number of elements.');
    }
    if (count($X) < 2) {
      throw new ErrorException('X and Y must have at least two elements.');
    }

    $∑XY = array_sum(array_map(fn (float $x, float $y) => $x * $y, $X, $Y));
    $∑X² = array_sum(array_map(fn (float $x) => $x * $x, $X));
    $∑Y² = array_sum(array_map(fn (float $y) => $y * $y, $Y));
    $√ = sqrt($∑X² * $∑Y²);

    try {
      return $∑XY / $√;
    } catch (\Throwable $th) {
      return 0;
    }
  }
}
