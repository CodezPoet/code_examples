<?php

declare(strict_types=1);

namespace Tests;

use App\Calculator;
use PHPUnit\Framework\TestCase;

/**
 * Test Class for Calculator Classs
 */
class CalculatorTest extends TestCase 
{  
    /**
     * Test the Add method in the Calculator
     * 
     * @return void
     */
    public function testAdd(): void {
        $calculator = new Calculator;
        $result = $calculator->add(20,5);

        $this->assertEquals(25, $result);
    }

    /**
     * Test the Add method in the Calculator
     * 
     * @return void
     */
    public function testSubtract(): void {
        $calculator = new Calculator;
        $result = $calculator->subtract(20,5);

        $this->assertEquals(15, $result);
    }
}
