<?php
/************************************************************************************
 * MODEL CHECKING PHP -> simple types	
 ************************************************************************************
 
 	PROPERTY  : "when variable $input is integer, $y will never have type string" 
	INPUT     : 'ListItem(#symInt(input))' 
	FORMULA   : '~Ltl <>Ltl hasType(gv(variable("y")),string)'
	
 **************************************************************************************/

	$input = user_input();
	
	if ($input <= 0) 
		$y = 0;
	else	
		$y = 1;
?>