--TEST--
division by zero
--FILE--
<?php
	var_dump(1 / 0);
?>
--EXPECTF--
Warning: Division by zero in %s on line %d
bool(false)
