<?php
/**
 * Test Runner for ReversePolishCalculator
 */
namespace TeamGeneric\ReversePolishCalculator;

/**
 *
 */
class ReversePolishCalculatorTest extends \PHPUnit_Framework_TestCase
{

    // --------------------------------------------------------------
    // RPC String Evaluation Tests
    // --------------------------------------------------------------

    /**
     * Test String Evaluation
     */
    public function testEvaluate()
    {
        $calc = new ReversePolishCalculator();
        $retval = $calc->evaluate("3 2 1 + *");
        $this->assertEquals(9, $retval);
    }

    /**
     * Test Float inputs
     */
    public function testEvaluateFloat()
    {
        $calc = new ReversePolishCalculator();
        $retval = $calc->evaluate("3 2.5 1.5 + *");
        $this->assertEquals(12, $retval);
    }


    /**
     * Too many operators. using OSX Calc as
     * Example, it should ignore the last operand
     * and return the last valid calculation (9)
     */
    public function testEvaluateTooManyOperators()
    {
        $calc = new ReversePolishCalculator();
        $retval = $calc->evaluate("3 2 1 + * /");
        $this->assertEquals(9, $retval);
    }

    /**
     * Too many operands. Will not evaluate 
     * the string correctly, so return false.
     */
    public function testEvaluateTooManyOperands()
    {
        $calc = new ReversePolishCalculator();
        $retval = $calc->evaluate("4 3 2 1 + *");
        $this->assertEquals(false, $retval);
    }

    // --------------------------------------------------------------
    // 
    // --------------------------------------------------------------

    /**
     * Test Calculate using a known problem
     */
    public function testCalculate()
    {
        $calc = new ReversePolishCalculator();
        $calc
            ->enter(3)
            ->enter(2)
            ->enter(1)
            ->add()
            ->multiply()
            ;

        $this->assertEquals([9], $calc->getStack());
    }

    /**
     * Test Calculate with floats as inputs
     */
    public function testCalculateFloatInput()
    {
        $calc = new ReversePolishCalculator();
        $calc
            ->enter(1.5)
            ->enter(1.5)
            ->add()
            ;

        $this->assertEquals([3], $calc->getStack());
    }


    /**
     * Test Calculate will return float values
     * properly
     */
    public function testCalculateFloatResult()
    {
        $calc = new ReversePolishCalculator();
        $calc
            ->enter(6)
            ->enter(5)
            ->enter(4)
            ->divide()
            ->subtract()
            ;

        $this->assertEquals([4.75], $calc->getStack());
    }

    /**
     * Test Add individually
     */
    public function testAddHex()
    {
        $calc = new ReversePolishCalculator();
        $calc
            ->enter(0x4)
            ->enter(0x4)
            ->add()
            ;
        $this->assertEquals([8], $calc->getStack());
    }


    /**
     * Test Add individually
     */
    public function testAdd()
    {
        $calc = new ReversePolishCalculator();
        $calc
            ->enter(3)
            ->enter(2)
            ->add()
            ;
        $this->assertEquals([5], $calc->getStack());
    }

    /**
     * Test subtract individually
     */
    public function testSubtract()
    {
        $calc = new ReversePolishCalculator();
        $calc
            ->enter(3)
            ->enter(2)
            ->subtract()
            ;
        $this->assertEquals([1], $calc->getStack());
    }

    /**
     * Test multiply individually
     */
    public function testMultiply()
    {
        $calc = new ReversePolishCalculator();
        $calc
            ->enter(3)
            ->enter(2)
            ->multiply()
            ;
        $this->assertEquals([6], $calc->getStack());
    }

    /**
     * Test divide invidvidually
     */
    public function testDivide()
    {
        $calc = new ReversePolishCalculator();
        $calc
            ->enter(10)
            ->enter(5)
            ->divide()
            ;

        $this->assertEquals([2], $calc->getStack());
    }

    /**
     * Test getAnswer
     */
    public function testGeAnswer()
    {
        $calc = new ReversePolishCalculator();
        $calc
            ->enter(4)
            ->enter(2)
            ->divide()
            ;

        $this->assertEquals(2, $calc->getAnswer());
    }

    /**
     * Test getAnswer incomplete.
     */
    public function testGeAnswerIncomplete()
    {
        $calc = new ReversePolishCalculator();
        $calc
            ->enter(4)
            ->enter(3)
            ->enter(2)
            ->divide()
            ;

        $this->assertEquals(false, $calc->getAnswer());
    }

}