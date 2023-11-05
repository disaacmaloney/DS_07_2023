<?php
class IdentityMatrixGenerator
{
    private $N;
    private $matrix;

    public function __construct($N)
    {
        $this->N = $N;
        $this->matrix = array();
    }

    public function generateIdentityMatrix()
    {
        if ($this->N % 2 != 0) {
            echo "El valor de N debe ser un número par.";
            exit;
        }

        for ($i = 0; $i < $this->N; $i++) {
            $fila = array();
            for ($j = 0; $j < $this->N; $j++) {
                if ($i == $j) {
                    $fila[] = 1;
                } else {
                    $fila[] = 0;
                }
            }
            $this->matrix[] = $fila;
        }
    }

    public function getMatrix()
    {
        return $this->matrix;
    }
}
