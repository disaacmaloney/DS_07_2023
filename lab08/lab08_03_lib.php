<?php
class RandomNumberGenerator
{
    private $values = array();

    public function generateUniqueNumbers($count, $min, $max)
    {
        while (count($this->values) < $count) {
            $numero = rand($min, $max);
            if (!in_array($numero, $this->values)) {
                $this->values[] = $numero;
            }
        }
    }

    public function findMax()
    {
        return max($this->values);
    }

    public function findMaxPosition()
    {
        $max = $this->findMax();
        return array_search($max, $this->values);
    }
}
