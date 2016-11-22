README
======

Overview
--------

This is a quick coding test that I was asked to do by a prospective employer. It's a
pretty straightforward implementation of a reverse polish notation calculator in Object
Oriented PHP. It also demonstrates a simple implementation of unit testing using [PHPUnit](https://phpunit.de/)


Install
-------

[Composer](https://getcomposer.org/) is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you.


We are using composer to manage the dependency on php and phpunit.


````
// get a copy of this repository
$ git clone https://github.com/TeamGeneric/reverse-polish-calculator.git

// use composer to install dependencies
$ cd reverse-polish-calculator
$ php composer.phar install

// run the phpunit tests
$ composer test

// run an example file showing its usage
$ php example.php

````

Usage
-----

````
$calc = new ReversePolishCalculator();

// evaluate using a functional style
$calc
	->enter(10)
	->enter(5)
	->enter(1)
	->add()
	->multiply()
	;

if(!$answer = $calc->getAnswer()){
	echo "cannot be fully evaluated. recheck the number of operands and operators";
} else {
	echo $answer;
}

// evaluate using a RPN string
if(!$answer = $calc->evaluate('10 5 1 + *')){
	echo "cannot be fully evaluated. recheck the number of operands and operators";
} else {
	echo $answer;
}

````


Tests
-----

Use PHPUnit to run test cases from the command line.

````
$ phpunit

or

$ composer test

````



