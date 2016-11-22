README
======


install
-------

Using composer as a dependency manager.

Composer is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you.

[source](https://getcomposer.org/doc/00-intro.md)


````
php composer.phar install
````

design
------

modeled after the reverse polish notation mode on the OSX calculator.

usage
-----

````
$calc = new ReversePolishCalculator();

$calc
	->enter(10)
	->enter(5)
	->enter(1)
	->add()
	->multiply()
	;

$stack = $calc->getStack();

// evaluate a RPN string
$val = $calc->evaluate('10 5 1 + *');

````


tests
-----

Use PHPUnit to run test cases from the command line

````
$ phpunit

or

$ composer test

````



