<?php
/*
 * This file is part of a reverse polish notation calculator
 *
 * (c) Marcus Alday <marcus@teamgeneric.com>
 *
 */
namespace TeamGeneric\ReversePolishCalculator;

/**
 * Implements a Reverse Polish Notation Calculator. 
 *
 * Usage:
 *    instantiate the calculator object. 
 *
 * @package    ReversePolishCalculator
 * @author     Marcus Alday <marcus@teamgeneric.com>
 * @copyright  Marcus Alday <marcus@teamgeneric.com>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       http://www.github.com/teamgeneric/reverse-polish-calculator
 * @see        http://en.wikipedia.org/wiki/Reverse_Polish_notation
 */
class ReversePolishCalculator
{

    /**
     * Operand Stack for calculator. it is an array
     */
    protected $stack;

    /**
     * Constructor
     */
    public function __construct($limit = 10) {
        // initialize the stack
        $this->stack = array();
    }


    /**
     * @param $operand a numerical value
     * @throws 
     */
    public function enter($operand){

        // Make sure there is a valid array
        if(!is_array($this->stack)){
            $this->stack = array();
        }

        // only push numeric values, else push a 0
        // ??? is this how the calculaor behaves?
        if(!is_numeric($operand)){
            array_push($this->stack, 0);
        } else {
            array_push($this->stack, floatval($operand));
        }
        return $this;
    }

    /**
     * Add
     * 
     * Must have at least two operands entered 
     * into the stack to perform the addtition, otherwise
     * it doesn't do anything. This mimics the behavior
     * of the Apple Calculator in RPN mode
     *
     * @param none
     * @return $this The RPCalc Object
     */
    public function add(){
        if(2 <= sizeof($this->stack)) {
            $number1 = array_pop($this->stack);
            $number2 = array_pop($this->stack);
            $sum = $number2 + $number1;
            array_push($this->stack, $sum);   
        }
        return $this;
    }

    /**
     * Subtract
     *
     * Must have at least two operands entered 
     * into the stack to perform the subtraction, otherwise
     * it doesn't do anything. This mimics the behavior
     * of the Apple Calculator in RPN mode
     *
     * @param none
     * @return $this The RPCalc Object
     */
    public function subtract(){
        if(2 <= sizeof($this->stack)) {
            $number1 = array_pop($this->stack);
            $number2 = array_pop($this->stack);
            $sum = $number2 - $number1;
            array_push($this->stack, $sum);
        }
        return $this;
    }

    /**
     * Multiply
     *
     * Must have at least two operands entered 
     * into the stack to perform the multiplication, otherwise
     * it doesn't do anything. This mimics the behavior
     * of the Apple Calculator in RPN mode
     * @param none
     * @return $this The RPCalc Object
     */
    public function multiply(){
        if(2 <= sizeof($this->stack)) {
            $number1 = array_pop($this->stack);
            $number2 = array_pop($this->stack);
            $sum = $number2 * $number1;
            array_push($this->stack, $sum);
        }
        return $this;
    }

    /**
     * Divide
     *
     * Must have at least two operands entered 
     * into the stack to perform the addtition, otherwise
     * it doesn't do anything. This mimics the behavior
     * of the Apple Calculator in RPN mode
     *
     * @param none
     * @return $this The RPCalc Object
     */
    public function divide(){
        if(2 <= sizeof($this->stack)) {
            $number1 = array_pop($this->stack);
            $number2 = array_pop($this->stack);
            $sum = $number2 / $number1;
            array_push($this->stack, $sum);
        }
        return $this;
    }


    /**
     * Clear the operand stack
     * @param none
     * @return $this The RPCalc Object
     */
    public function clear(){
        $this->stack = array();
        return $this;
    }



    /**
     * Evaluate a Reverse Polish Notation String
     * @param $str
     * @return the calculated value or FALSE
     */
    public function evaluate($str){
        
        if(empty($str)){
            return false; // or throw
        }

        return $this->evaluateTokens(explode(" ", $str));
    }

    /**
     * Evaluate an array of operand and operator tokens using
     * reverse polish notation
     *
     * @param tokens
     * @return the calculated value or FALSE
     */
    public function evaluateTokens($tokens){

        if(!isset($tokens) || empty($tokens)){
            return false;
        }

        foreach($tokens as $token){
            switch($token){
                case '+':
                    $this->add();
                    break;
                case '-':
                    $this->subtract();
                    break;
                case '/':
                    $this->divide();
                    break;
                case '*':
                    $this->multiply();
                    break;
                default:
                    // convert string to either float or int
                    // @see http://stackoverflow.com/questions/8529656/how-do-i-convert-a-string-to-a-number-in-php
                    //$val = strpos($token, '.') === false ? intval($token) : floatval($token);
                    //$this->enter($val);
                    $this->enter(floatval($token));
            }
        }

        if(1 === sizeof($this->stack)){
            return($this->stack[0]);
        } else {
            return false;
        }
    }

    /**
     * give access to the call stack
     */
    public function getStack(){
        return $this->stack;
    }

    /**
     * wrapper arount print_r...for testing
     */
    public function toString(){
        print_r($this->stack);
    }
}