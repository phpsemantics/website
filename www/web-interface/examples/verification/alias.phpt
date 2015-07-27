<?php

/************************************************************************************
 * MODEL CHECKING PHP -> aliasing	
 ************************************************************************************
 
 	PROPERTY  : "global variable $x and local $x at some point will be aliased"
	INPUT     : 'ListItem(0)'
	FORMULA   : '<>Ltl alias(gv(variable("y")),fv("foo", variable("x")))'
	
 **************************************************************************************/

	$y = 0;
	
	function foo() {
		global $y;
		$x = &$y;
	}
	
	foo();
?>