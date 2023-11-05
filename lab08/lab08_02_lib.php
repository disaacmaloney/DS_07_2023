<?php
class FactorialCalculator
{
    public function calculateFactorial($number)
    {
        if ($number == 0) {
            return 1;
        } else {
            return $number * $this->calculateFactorial($number - 1);
        }
    }
}
