<?php

namespace App;

/**
 * Calculator Class
 */
class Calculator
{    
    /**
     * Calculator Add method
     * 
     * @param float $num1
     * @param float $num2
     * 
     * @return int
     */
    public function add(float $num1, float $num2): float {
        return $num1 + $num2;
    }

    /**
     * Calculator Subtract Method
     * 
     * @param float $num1
     * @param float $num2
     * 
     * @return int
     */
    public function subtract(float $num1, float $num2): float {
        return $num1 - $num2;
    }

    /**
     * Calculator Multiply Method
     * 
     * @param float $num1
     * @param float $num2
     * 
     * @return int
     */
    public function multiply(float $num1, float $num2): float {
        return $num1 * $num2;
    }

    /**
     * Calculator Divide Method
     * 
     * @param float $num1
     * @param float $num2
     * 
     * @return int
     */
    public function divide(float $num1, float $num2): float {
        return $num1 / $num2;
    }
}
