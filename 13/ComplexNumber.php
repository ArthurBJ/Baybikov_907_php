<?php


class ComplexNumber
{
    private float $re;
    private float $im;

    public function __construct($re, $im) {
        $this->re = $re;
        $this->im = $im;
    }

    public function add(ComplexNumber $cn) {
        $this->re += $cn->re;
        $this->im += $cn->im;
    }

    public function sub(ComplexNumber $cn) {
        $this->re -= $cn->re;
        $this->im -= $cn->im;
    }

    public function mult(ComplexNumber $cn) {
        $a = $this->re;
        $b = $this->im;
        $this->re = $this->re * $cn->re - $this->im * $cn->im;
        $this->im = $a * $cn->im + $b * $cn->re;
    }

    public function div(ComplexNumber $cn) {
        $a = $this->re;
        $b = $this->im;

        $c = $cn->re;
        $d = $cn->im;
        if ($c != 0 && $d != 0) {
            $this->re = ($a * $c + $b * $d) / (pow($c, 2) + pow($d, 2));
            $this->im = ($b * $c - $a * $d) / (pow($c, 2) + pow($d, 2));
        } else {
            return "You can't div 0";
        }
    }

    public function abs() {
        $a = abs($this->re);
        $b = abs($this->im);
        if ($a == 0)
            $res = $b;
        elseif ($b == 0)
            $res = $a;
        elseif ($a > $b) {
            $temp = $b / $a;
            $res = $a * sqrt(1 + $temp * $temp);
        } else {
            $temp = $a / $b;
            $res = $b * sqrt(1 + $temp * $temp);
        }
        return $res;
    }

    public function __toString()
    {
        if ($this->im >= 0)
            return $this->re . "+" . $this->im . "i";
        else return $this->re . "-" . -$this->im . "i";
    }

}