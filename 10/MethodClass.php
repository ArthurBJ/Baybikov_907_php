<?php
use exceptions\Exception_1;
use exceptions\Exception_2;
use exceptions\Exception_3;
use exceptions\Exception_4;
use exceptions\Exception_5;

class MethodClass {

    public function exc1() {
        $random = rand(0, 1);
        switch ($random) {
            case 0:
                throw new Exception_1();
                break;
            case 1:
                throw new Exception_2();
                break;
        }
    }

    public function exc2() {
        $random = rand(0, 1);
        switch ($random) {
            case 0:
                throw new Exception_2();
                break;
            case 1:
                throw new Exception_3();
                break;
        }
    }

    public function exc3() {
        $random = rand(0, 1);
        switch ($random) {
            case 0:
                throw new Exception_3();
                break;
            case 1:
                throw new Exception_4();
                break;
        }
    }

    public function exc4() {
        $random = rand(0, 1);
        switch ($random) {
            case 0:
                throw new Exception_4();
                break;
            case 1:
                throw new Exception_5();
                break;
        }
    }
}