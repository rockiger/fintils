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
}
