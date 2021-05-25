<?php
require_once 'ComplexNumber.php';
use PHPUnit\Framework\TestCase;

class ComplexNumberTest extends TestCase
{
    public function testAdd() {
        $cn = new ComplexNumber(13, 7);
        $cn->add(new ComplexNumber(6, 10));
        $this->assertEquals("19+17i", $cn->__toString());
    }

    public function testAddWrong() {
        $cn = new ComplexNumber(13, 7);
        $cn->add(new ComplexNumber(6, 10));
        $this->assertTrue("2+3i" != $cn->__toString());
    }

    public function testSub() {
        $cn = new ComplexNumber(13, 7);
        $cn->sub(new ComplexNumber(6, 10));
        $this->assertEquals("7-3i", $cn->__toString());
    }

    public function testSubWrong() {
        $cn = new ComplexNumber(13, 7);
        $cn->sub(new ComplexNumber(6, 10));
        $this->assertTrue("27+13i" != $cn->__toString());
    }

    public function testMult() {
        $cn = new ComplexNumber(13, 7);
        $cn->mult(new ComplexNumber(5, -6));
        $this->assertEquals("107-43i", $cn->__toString());
    }

    public function testMultWrong() {
        $cn = new ComplexNumber(13, 7);
        $cn->mult(new ComplexNumber(5, -6));
        $this->assertTrue("17+43i" != $cn->__toString());
    }

    public function testDiv() {
        $cn = new ComplexNumber(-2, 1);
        $cn->div(new ComplexNumber(1, 1));
        $this->assertEquals("-0.5+1.5i", $cn->__toString());
    }

    public function testDivWrong() {
        $cn = new ComplexNumber(-2, 1);
        $cn->div(new ComplexNumber(1, 1));
        $this->assertTrue("1.5-2i" != $cn->__toString());
    }

    public function testDivZero() {
        $cn = new ComplexNumber(-2, 1);
        $this->assertEquals("You can't div 0" , $cn->div(new ComplexNumber(0, 0)));
    }

    public function testAbs() {
        $cn = new ComplexNumber(13, 7);
        $this->assertEquals(14.764823060233, $cn->abs());
    }

    public function testAbsWrong() {
        $cn = new ComplexNumber(13, 7);
        $this->assertTrue(13 != $cn->abs());
    }
}