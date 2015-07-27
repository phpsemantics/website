--TEST--
A test which intentionally fails!
--FILE--
<?php
	var_dump(3 == "asd");
	var_dump("asd" == 3);
?>
--EXPECT--
bool(true)
bool(false)