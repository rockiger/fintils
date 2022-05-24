<?php

namespace Rockiger\Fintils;

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
}
