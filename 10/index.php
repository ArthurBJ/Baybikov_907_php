<?php
use exceptions\Exception_1;
use exceptions\Exception_2;
use exceptions\Exception_3;
use exceptions\Exception_4;
use exceptions\Exception_5;

spl_autoload_register(function ($className) {
    include $className . '.php';
});

$exc = new MethodClass();

try {
    $exc->exc1();
} catch (Exception_2 $testSecond) {
    echo 'Second Exception';
} catch (Exception_1 $testFirst) {
    echo 'First Exception';
}

try {
    $exc->exc2();
} catch (Exception_3 $testThird) {
    echo 'Third Exception';
} catch (Exception_2 $testSecond) {
    echo 'Second Exception';
}

try {
    $exc->exc3();
} catch (Exception_4 $testFourth) {
    echo 'Fourth Exception';
} catch (Exception_3 $testThird) {
    echo 'Third Exception';
}

try {
    $exc->exc4();
} catch (Exception_5 $testFifth) {
    echo 'Fifth Exception';
} catch (Exception_4 $testFourth) {
    echo 'Fourth Exception';
}
