--TEST--
is_scalar
--FILE--
<?php
	var_dump(is_scalar(array()));	
	var_dump(is_scalar(123));	
	var_dump(is_scalar(true));	
	var_dump(is_scalar("true"));	
?>
--EXPECT--
bool(false)
bool(true)
bool(true)
bool(true)