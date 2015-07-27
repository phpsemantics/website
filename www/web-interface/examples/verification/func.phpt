<?php

/************************************************************************************
 * MODEL CHECKING PHP -> local vs global variables	
 ************************************************************************************
 
 	PROPERTY  : "at some point the variable $x local to function "foo" has value 4":
	INPUT     : "ListItem(0)" 
	FORMULA   : '<>Ltl eqTo(fv("foo",variable("x")),val(4))' 
	
	PROPERTY  : "but not the global version of x (which instead has value 0)":
	INPUT     : "ListItem(0)"
	FORMULA   : '<>Ltl eqTo(gv(variable("x")),val(4))'

	PROPERTY  : "global variable $y is never initialized (i.e. always NULL)":
	INPUT     : "ListItem(0)"
	FORMULA   : '[]Ltl eqTo(gv(variable("y")),val(NULL))' 

	
 **************************************************************************************/
	
	$x = 0;
	
	function foo() {
		$x = 4;
	}
	
	foo();
?>