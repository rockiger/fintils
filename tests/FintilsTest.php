<?php

declare(strict_types=1);

namespace Rockiger\Fintils;

use PHPUnit\Framework\TestCase;

final class FintilsTest extends TestCase {

  public function testR(): void {
    $this->assertEquals(0.1, Fintils::R(110, 100));
    $this->assertEquals(0.0, Fintils::R(100, 100));
    $this->assertEquals(0.0, Fintils::R(100));
  }

  public function testRs(): void {
    $this->assertEquals(
      [0, 0.1, 0.0454545454545454, -0.0869565217391305, -0.0476190476190477],
      Fintils::Rs([100, 110, 115, 105, 100])
    );
    $this->assertEquals(
      [],
      Fintils::Rs([])
    );

    $this->assertEquals(
      [0.0],
      Fintils::Rs([100])
    );
  }

  public function testDq(): void {
    $this->assertEquals(
      1.0,
      Fintils::dq([0, 0.1, 0.0454545454545454, -0.0869565217391305, -0.0476190476190477], [0, 0.1, 0.0454545454545454, -0.0869565217391305, -0.0476190476190477])
    );
    $this->assertEquals(
      -1.0,
      Fintils::dq(
        [0, -0.1, -0.0454545454545454, 0.0869565217391305, 0.0476190476190477],
        [0, 0.1, 0.0454545454545454, -0.0869565217391305, -0.0476190476190477]
      )
    );
    $this->expectExceptionMessage('X and Y must have the same number of elements.');
    Fintils::dq([0, 0.1], [0]);

    $this->expectExceptionMessage('X and Y must have at least two elements.');
    Fintils::dq([0], [0]);
  }
}
