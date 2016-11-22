<?php

namespace TeamGeneric\ReversePolishCalculator;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/ReversePolishCalculator.php';


$calc = new ReversePolishCalculator();

// ------------------------------------------------------------------
// evaluate using a functional style
// ------------------------------------------------------------------
$calc
    ->enter(3)
    ->enter(2)
    ->enter(1)
    ->add()
    ->multiply()
    ;

if(!$answer = $calc->getAnswer()){
    echo "cannot be fully evaluated. recheck the number of operands and operators";
} else {
    echo "answer: " . $answer . "\n";
}

// ------------------------------------------------------------------
// evaluate using a RPN string
// ------------------------------------------------------------------
$calc->clear(); // clear the calculator

if(!$answer = $calc->evaluate("3 2 1 + *")){
    echo "cannot be fully evaluated. recheck the number of operands and operators";
} else {
    echo "answer: " . $answer . "\n";
}